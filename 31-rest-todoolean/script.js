// replicare una todo-list che permetta allo user di leggere tutti i tasks inseriti a aggiungerne di nuovi ed eliminare quelli vecchi

// funzione che cancelli i todos
function deleteTodosListener() {
  $(document).on("click", ".deleteX", deleteTodos );

  // MIO METODO
  // var target = $(".deleteX");//seleziono la X al cui click parte una funzione chiamata deleteX
  // target.click(deleteTodos);
  // console.log(target);
}
function deleteTodos() {
  console.log("si è innescata la funzione che fa chiamata AJAX con metodo DELETE");

  // selezio la "X" che cancella
  var deleteX = $(this);
  // ne estraggo l'id
  console.log(deleteX);
  var id = deleteX.data("id");
  console.log("la X ha id ", id);

  $.ajax({
    // aggiungo nella chiamata l'id del todo da cancellare
    url: 'http://157.230.17.132:3033/todos/' + id,
    method: "DELETE",
    success: function(data) {
      console.log("data", data);
      getTodos();
    },
    error: function(err) {
      console.log("err", err);
    }
  });
}

// funzione che invia un todo tamite chiamata all'api con metodo POST
function addTodosListener() {
  // seleziono il bottone
  var insertTodo = $("#sendTodo");
  //al click aziono la richiesta ajax di invocazione
  insertTodo.click(addTodos);
}
function addTodos() {
  // prendo i valori dall'input
  var targetInput = $("#newTodo");
  // ne estraggo il valore su una nuova variabile
  var textNewTodo = targetInput.val();
  //pulisco il value dell'input immesso
  targetInput.val("");
  console.log(textNewTodo);
  // chiamata ajax all'api col metodo POST
  $.ajax({
    url: "http://157.230.17.132:3033/todos",
    method: "POST",
    data: {
      text: textNewTodo
    },
    success: function(data) {
      // console.log("data", data);
      //invoco la funzione già definita che dà i todos
      getTodos();
    },
    error: function(err) {
      console.log("err", err);
    }
  });


}

// funzione che legge i todos tramite chiamata all'api con metodo GET
function getTodos() {
  // faccio chiamata AJAX per prendere i todos riservati a me
  $.ajax({
    // utilizzo la porta a me dedicata
    url: "http://157.230.17.132:3033/todos",
    method: 'GET',
    success: function(data) {
      console.log('data', data);//dà 3 oggetti con chiavi "text" e "id"
      // se l'esito è positivo aziono la funzione printTotos
      printTotos(data);
    },
    error: function(err) {
      console.log('err', err);
    }
  })
}
function printTotos(todos) {

  //definisco le 3 variabili per applicare HANDLEBARS, template compile, compile, target
  var template = $("#todos-template").html();
  var compiled = Handlebars.compile(template);
  var target = $("#todos");
  // dopo che creo la funzione invio dati all'api, pulisco il target e lo preparo per la funzione printTodos
  target.html("");

  // creo un ciclo for che prenda gli elementi oggetto dell'arrai todos, contenuto nella success
  for(var i=0; i<todos.length; i++) {
    // console.log("todos", todos[i]);

    //definisco vriabili la chiave text e la chiave id
    var todosText = todos[i].text;
    var todosId = todos[i].id;

    // completo le fasi dell'Hanflebars con l'invocazione della funzione compiled() che appendo al target indicando chiavi e valori opportuni da scrivere
    var templateHTML = compiled({
      todosId: todosId,
      todosText: todosText
    });
    target.append(templateHTML);
  }
}

function init() {
  // console.log("hello world");
  getTodos();
  addTodosListener();
  deleteTodosListener();
}
$(document).ready(init);


// CIO' CHE DEVO USARE :
// API:
// 	READ: GET - http://157.230.17.132:3000/todos
// 	INSERT: POST - http://157.230.17.132:3000/todos - DATA: text
// 	DELETE: DELETE - http://157.230.17.132:3000/todos/ID
//
// Domingo Verdini - :3033
