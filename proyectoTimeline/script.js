/**
 * Encapsulamos la partida
 */
 var yearPuesto=new Array; 
 var yearIndex=new Array; 
 var yearFree=new Array; 
 var cont = 0

 var Game = function() {
    // the empty slots for moving cards
    this.free = [null, null, null, null, null, null, null, null,null,null]
    // the columns of cards
    this.columns = [[], [], [], []];
    // the years in game
    this.year = ["1492","1789","1914","1936","1939","1945","1969","1989","1990","2001"]
    // the deck of cards
    this.deck = new this.Deck();
};

/**
 * Inicializamos el objeto Game.
 */
Game.prototype.init = function() {
    var card;

    // shuffle the deck
    this.deck.shuffle();

    for (var i = 0; i < 4; i++) {
        // add the cards to the columns
        card = this.deck.cards[i];
        this.columns[i % 4].push(card);
    }
};

/**
 * Reset del juego
 */
Game.prototype.reset = function() {
    var i, col;

    this.free = [null, null, null, null, null, null, null, null,null,null]

    for (i = 0; i < 4; i++) {
        col = this.columns[i];
        col.length = 0;
    }

    this.init();
};

/**
 * Crear un array de ids con las cartas draggeables validas
 */
Game.prototype.valid_drag_ids = function() {
    var drag_ids, i, card, col, col_len;

    drag_ids = [];

    // add cards in freecell spaces
    for (i = 0; i < this.year.length; i++) {
        card = this.free[i];
        if (card !== null) {
            drag_ids.push(card.id.toString());
        }
    }
    // add cards at the bottom of columns
    for (i = 0; i < 4; i++) {
        col = this.columns[i];
        col_len = col.length;
        if (col_len > 0) {
            card = col[col_len - 1];
            drag_ids.push(card.id.toString());
        }
    }

    return drag_ids;
};

//Aqui tenemos los id de los huecos y las cartas

/**
 * the id attribute string in the DOM.
 * Crear un array de ids de los drops de la carta, 
 */
Game.prototype.valid_drop_ids = function(card_id) {
    var drop_ids, i, free, suit_card, drag_card, bottom_cards, card, col;

    drop_ids = [];

    // the card being dragged
    drag_card = this.deck.get_card(card_id);

    // add empty freecells
    for (i = 0; i < this.year.length; i++) {
        free = this.free[i];
        if (free === null) {
            drop_ids.push('free' + i.toString());
        }
    }
    // Añadir datascells vacias
   /* for (i = 0; i < this.year.length() ; i++)
    {
       $("#main-carousel").append('<article class="node-card"><h2 class="main-title -second">' + year[i] + '</h2> );
    }*/
    for (i = 0; i < 11; i++) {
        free = this.free[i];
        if (free === null) {
            drop_ids.push('free' + i.toString());
        }
    }


    // añadir carta valida a la columna
    bottom_cards = this.col_bottom_cards();
    for (i = 0; i < bottom_cards.length; i++) {
        card = bottom_cards[i];
            drop_ids.push(card.id.toString());
        
    }

    // añadir columna vacía como drop
    for (i = 0; i < 4; i++) {
        col = this.columns[i];
        if (col.length === 0) {
            drop_ids.push('col' + i.toString());
        }
    }
    
    return drop_ids;
};

/*
 * Devuelve un array de cartas da las columnas
 */
Game.prototype.col_bottom_cards = function() {
    var i, col, card_count, bottom_cards;

    bottom_cards = [];

    for (i = 0; i < 4; i++) {
        col = this.columns[i];
        card_count = col.length;
        if (card_count > 0) {
            bottom_cards.push(col[card_count - 1]);
        }
    }

    return bottom_cards;
};

/**
 * movemos una carta a otro sitio
 */
Game.prototype.move_card = function(drag_id, drop_id) {
    var drag_card, col_index;

    // popeamos la carta de su sitio actual
    drag_card = this.pop_card(drag_id);

    if (drop_id.length <= 2) {
        // dropeamos la carta en otra columna
        drop_id = parseInt(drop_id, 10);
        this.push_card(drag_card, drop_id);
    } else {
        // dropear en una free o columna vacia
        // the index of
        col_index = parseInt(drop_id.charAt(drop_id.length - 1), 10);
        if (drop_id.slice(0, 1) === 'f') {
            // dropping on a freecell
            this.free[col_index] = drag_card;
        } else {
            // dropping on an empty column
            this.columns[col_index].push(drag_card);
        }
    }
};

/**
 * card_id es un integer.
 * Devuelve el objeto carta y lo quita de su posición actual
 */
Game.prototype.pop_card = function(card_id) {
    var i, col, card;

    // Revisa todas las columnas
    for (i = 0; i < 4; i++) {
        col = this.columns[i];
        if (col.length === 0) {
            continue;
        }
        card = col[col.length - 1];
        if (card.id === card_id) {
            return col.pop();
        }
    }

    // Revisa las free
    for (i = 0; i < 10; i++) {
        card = this.free[i];
        if ((card !== null) && (card.id === card_id)) {
            this.free[i] = null;
            return card;
        }
    }
    // nunca debería llegar a este putno, siempre deben haber cartas
    alert('error in Game.pop_card()');
    return null;
};

/**
 * Mueve la carta a una columna basado en el if de la carta 
 */
Game.prototype.push_card = function(card, drop_id) {
    var i, col, col_len, bottom_card;

    for (i = 0; i < 4; i++) {
        col = this.columns[i];
        col_len = col.length;
        if (col_len === 0) {
            continue;
        }
        bottom_card = col[col.length - 1];
        if (bottom_card.id === drop_id) {
            col.push(card);
            return;
        }
    }
};

/**
 * Se ha ganado el juego?
 */
Game.prototype.is_game_won = function() {
    var i,j, card;

    for (i = 0; i < 4; i++) {
            card = this.free;
        if (card[i] == null) {
            return false;
        }
    }
    return true;
};

/******************************************************************************/

/**
 * El objeto baraja contiene un array de cartas.
 *//*Llamaremos a las imagenes: año.png de forma que se comparen con las celdas del timeline y las cartas*/
Game.prototype.Deck = function() {
    var i, year;
    year = [1492,1789,1914,1936,1939,1945,1969,1989,1990,2001]
    this.cards = [];
    
    for (i = 0; i < year.length; i++) {
        this.cards.push(new this.Card(i+1,year[i]));
    }
};

/**
 * Barajeamos las cartas en el mazo
 */
Game.prototype.Deck.prototype.shuffle = function() {
    var len, i, j, item_j;

    // Util para debug, saca las cartas en el orden optimo
    /*
    this.cards.sort(function(a, b) {
        if (a.value < b.value) {
            return -1;
        }
        if (a.value > b.value) {
            return 1;
        }
        return 0;
    });
    this.cards.reverse();
    */

    len = this.cards.length;
    for (i = 0; i < len; i++) {
        j = Math.floor(len * Math.random());
        item_j = this.cards[j];
        this.cards[j] = this.cards[i];
        this.cards[i] = item_j;
    }
};

/**
 * Saca la carta por el id
 */
Game.prototype.Deck.prototype.get_card = function(card_id) {
    var i, card;

    for (i = 0; i < 8; i++) {
        card = this.cards[i];
        if (card_id === card.id) {
            return card;
        }
    }
    // only reach this if invalid card_id is supplied
    alert('error in Deck.get_card()');
    return null;
};

/******************************************************************************/

/**
 * Card object
 */
Game.prototype.Deck.prototype.Card = function(id,year) {
    this.year = year;
    this.id = id;
};

/**
 * The image name and location as a string. Used when creating the web page.
 */
Game.prototype.Deck.prototype.Card.prototype.image = function() {
    return 'images/' + this.year.toString() + '.png';
};

/******************************************************************************/

/**
 * La interfaz de usuario
 */
var UI = function(game) {
    this.game = game;
    // an array of all the draggables
    this.drag = [];
    // an array of all the droppables
    this.drop = [];

    this.yearPuesto = [];

};

/**
 * Inicializamos la interfaz de usuario
 */
UI.prototype.init = function() {
    this.game.init();

    this.add_cards();

    // Creamos el popup de victoria
    this.win();
    // Creamos el botón de juego nuevo
    this.new_game();
    // Creamos el dialogo de ayuda y el popup
    this.help();

    this.setup_secret();

    // inicializamos draggables
    this.create_draggables();
};

/**
 * Añadir cartas a la interfaz de usuario
 */
UI.prototype.add_cards = function() {
    var i, j, cards, num_cards, col_div, card, img, card_div;

    for (i = 0; i < 4; i++) {
        cards = this.game.columns[i];
        num_cards = cards.length;

        // mete refencia en el div de columna
        col_div = document.getElementById('col' + i.toString());

        for (j = 0; j < num_cards; j++) {
            // añade divs de carta al div columna

            card = cards[j];
            img = new Image();
            img.src = card.image();

            card_div = document.createElement('div');
            card_div.className = 'card';
            card_div.id = card.id;
            card_div.style.top = (25 * j).toString() + 'px';
            card_div.appendChild(img);

            col_div.appendChild(card_div);
        }
    }
};



/**
 * Quita las cartas de la interfaz de usuario
 */
UI.prototype.remove_cards = function() {
    var i;

    for (i = 0; i < 8; i++)
    {
        $('#col' + i.toString()).empty();
    }
};

/**
 * Creamos draggables: Cartas en las free y en las columnas pueden moverse
 */
UI.prototype.create_draggables = function() {
    var card_ids, card_count, i, id, card_div, this_ui;

    card_ids = this.game.valid_drag_ids();
    card_count = card_ids.length;
    this_ui = this;

    for (i = 0; i < card_count; i++) {
        id = card_ids[i];
        card_div = $('#' + id);

        // Añade a la lista de draggables
        this_ui.drag.push(card_div);

        card_div.draggable({
            stack: '.card',
            containment: '#table',
            revert: 'invalid',
            revertDuration: 800,
            start: this_ui.create_droppables(),
            stop: this_ui.clear_drag()
        });
        card_div.draggable('enable');

        // Añade el evento doble click a todos los draggables
        card_div.bind('dblclick', {this_ui: this_ui}, this_ui.dblclick_draggable);

        card_div.hover(
            // hover 
            function(event) {
                $(this).addClass('highlight');
            },
            // hover fin
            function(event) {
                $(this).removeClass('highlight');
            }
        );
    }
};

/**
 * Cuando una carta draggable está en una columna y se hace doble click, se revisa si se puede mover a otra columna 
 * o a un free vacio, si puede entonces se mueve
 */
UI.prototype.dblclick_draggable = function(event) {
    var this_ui, drop_ids, card_id, drop_len, i, drop_id, drop_div;
    this_ui = event.data.this_ui;

    // the valid drop locations for this card
    card_id = parseInt(this.id, 10);
    drop_ids = this_ui.game.valid_drop_ids(card_id);
    drop_len = drop_ids.length;

    // can the card be moved to an empty freecell
    for (i = 0; i < drop_len; i++) {
        drop_id = drop_ids[i];
        if (drop_id.substr(0, 4) === 'free') {
            this_ui.dblclick_move(card_id, drop_id, this_ui);
            return;
        }
    }
};

UI.prototype.dblclick_move = function(card_id, drop_id, this_ui) {
    var offset_end, offset_current, drop_div, left_end, top_end, left_move,
        top_move, card, left_current, top_current, max_z;

    card = $('#' + card_id);
    drop_div = $('#' + drop_id);
    offset_end = drop_div.offset();
    offset_current = card.offset();

    left_end = offset_end['left'];
    top_end = offset_end['top'];
    left_current = offset_current['left'];
    top_current = offset_current['top'];

    // Añade 3 al borde
    left_move = left_end - left_current + 3;
    top_move = top_end - top_current + 3;

    // Antes de mover una carta, se stackea en el resto
    max_z = this_ui.card_max_zindex();
    card.css('z-index', max_z + 1);

    card.animate({top: '+=' + top_move, left: '+=' + left_move},
                  250,
                  function() {
                        // tell the game the card has moved
                        this_ui.game.move_card(card_id, drop_id);
                        this_ui.clear_drag()();
                        this_ui.is_won();

    });
};

UI.prototype.card_max_zindex = function() {
    var max_z = 0;
    $('.card').each(function(i, el) {
        z_index = parseInt($(el).css('z-index'), 10);
        if (!isNaN(z_index) && z_index > max_z) {
            max_z = z_index;
        }
    });
    return max_z;
};

/**
 * Crea droppables: Cuando una carta se mueve, se decide donde se dropea. Este metodo debe usarse al iniciar
 * un drag de carta
 * 
 * Este metodo debe usar metodos de Game para tomar decisiones
 * 
 * Usa este como callback para el inicio del evento del drag, por esto tiene 2 parametros (event, ui)
 */
UI.prototype.create_droppables = function() {
    var this_ui;
    this_ui = this;
    year = ["1492","1789","1914","1936","1939","1945","1969","1989","1990","2001"]

    var droppers = function(event, ui) {
        var drop_ids, i, j,drop_id, drag_id, drop_div,aux;

        drag_id = parseInt($(this).attr('id'), 10);
        drop_ids = this_ui.game.valid_drop_ids(drag_id);

        for (i = 0; i < drop_ids.length; i++) {
            drop_id = drop_ids[i];
            drop_div = $('#' + drop_id.toString());
            // Añade al array de dropeables
            this_ui.drop.push(drop_div);
            drop_div.droppable({
                drop: function(event, ui) {
                    var card_offset, this_id;

                    this_id = $(this).attr('id');
                    this_class = $(this).attr('class');
                    if (this_id.length <= 2) {
                        // Esto es una carta
                        card_offset = '0 25';
                    } else if (this_id.charAt(0) === 'c') {
                        // Esto es una column vacia
                        card_offset = '1 1';
                    } else {
                        // Esto es un free
                        card_offset = '3 3';
                    }

                    // mueve droppeable a la posición correcta
                    ui.draggable.position({
                        of: $(this),
                        my: 'left top',
                        at: 'left top',
                        offset: card_offset
                    });

                    // Le dice al juego que una carta se movió
                    this_ui.game.move_card(drag_id, this_id);

                    //Muestra el articulo, en base a el espacio donde se pone
                    //TODO: Modificar codigo para que funcione con los id de year y no free
                    aux = i.toString();
                    UI.prototype.filtrarFallo(year[drag_id-1],this_id)

                    for (j = 0; j < year.length; j++) {
                    
                        UI.prototype.mostrarArticulo(year[drag_id-1])
                        UI.prototype.mostrarFree(this_id,year[drag_id-1])
                        UI.prototype.add_cards_car(year[drag_id-1], year[drag_id-1]);
                    }

                    // Se ha completado el juego?
                    this_ui.is_won();

                    // reset ui para parar los dropeables
                    this_ui.clear_drop();
                }
            });
            drop_div.droppable('enable');
        }
    };

    return droppers;
};

/*Enseña articulo basado en el año */

UI.prototype.filtrarFallo=function(year,idInicio) {
    yearPuesto.push(year)

    // Necesitamos sacar los frees que vamos poniendo, para comparar si es derecha o izquierda la posición de la carta actual, si la actual es mayor eso es que está a la derecha
    // Poner un if que filtre por idInicio comparando como string si es un freeNormal o Aux
    auxFree = idInicio.slice(0, 4)
    auxNum = idInicio.slice(4, 5)
// Necesito un crear un array de años para filtrar por free y sacar el indice de todos huecos con carta y filtrar por ellos
// Tanto el indice de la posición en un free de la carta como el año de la carta, deben ser mayores si están a la izquierda de todas las cartas puestas
// meto enel 5(1945), luego en el 3(1936), y en el 4(1956)
//Representación: Al meter el 4º
//     1936                        1956                       1945        
//   Revisa el 1º               Revisa el 2º                  Salta fallo,
// Es menor el año? si? -       Es menor el año? no?          Está a la derecha de un añor mayor que el.
// -> está a la derecha? ok     Está a la izquierda? X
    if(idInicio == "free5"){
        //Primer free
    yearFree.push(auxNum)
      //  yearFreep = 
    }else if(idInicio != "free5" && auxNum < yearFree.reverse()[0]){
        //Izquierda
        if(year > yearPuesto){
         alert ("Fallaste en la posición!");
         document.getElementById("newgame").click();         
         }

    }else if(idInicio != "free5" && auxNum > yearFree[0]){
        //derecha
        if(year < yearPuesto){

        alert ("Fallaste en la posición!");
        document.getElementById("newgame").click();         
    }
    }
    yearFree.push(auxNum)

    cont++;
  }

UI.prototype.mostrarArticulo=function(id) {
    var x = document.getElementsByClassName(id);
    for (i = 0; i < x.length; i++) {
    if (x[i].style.display === "none") {
      x[i].style.display = "flex";
    } else {
      x[i].style.display = "none";
    }
    }
  }
  UI.prototype.mostrarFree=function(idInicio, year) {
    
    years = ["1492","1789","1914","1936","1939","1945","1969","1989","1990","2001"];
    yearPuesto.push(year)

    // Necesitamos sacar los frees que vamos poniendo, para comparar si es derecha o izquierda la posición de la carta actual, si la actual es mayor eso es que está a la derecha
    // Poner un if que filtre por idInicio comparando como string si es un freeNormal o Aux
    auxFree = idInicio.slice(0, 4)
    auxNum = idInicio.slice(4, 5)

  // 
  //  if(idInicio == "free5"){
  //      //Primer free
  //      yearFree.push(auxNum)
  //  }else if(idInicio != "free5" && auxNum < yearFree[0]){
  //      //Izquierda
  //      if(year > yearPuesto){
  //       alert ("Fallaste en la posición!");
  //        }
//
  //  }else if(idInicio != "free5" && auxNum > yearFree[0]){
  //      //derecha
  //      if(year < yearPuesto){
//
  //      alert ("Fallaste en la posición!");
  //      }
  //  }
   

    if (parseInt(auxNum) % 2 != 0 && idInicio != "free5") {
    auxNumMas = parseInt(auxNum)+1
    auxNumMenos = parseInt(auxNum)-1
    var x = document.getElementById(auxFree+auxNumMas);
    var y = document.getElementById(auxFree+auxNumMenos);
   // var y = document.getElementById(id);
    if (x.style.display === "none") {
      x.style.display = "inline";
    } else {
      x.style.display = "none";
    }
    if (y.style.display === "none") {
        y.style.display = "inline";
      } else {
        y.style.display = "none";
      }
}else if(idInicio == "free5"){
    auxFree = idInicio.slice(0, 4)
    auxNum = idInicio.slice(4, 5)
    auxNumMas = parseInt(auxNum)+2
    auxNumMenos = parseInt(auxNum)-2
    var x = document.getElementById(auxFree+auxNumMas);
    var y = document.getElementById(auxFree+auxNumMenos);
   // var y = document.getElementById(id);
    if (x.style.display == "none") {
      x.style.display = "inline";
    } else {
      x.style.display = "none";
    }
    if (y.style.display == "none") {
        y.style.display = "inline";
      } else {
        y.style.display = "none";
      }
}else if(parseInt(auxNum) % 2 == 0 ){
    auxNumMas = parseInt(auxNum)+1
    auxNumMenos = parseInt(auxNum)-1
    var x = document.getElementById(auxFree+auxNumMas);
    var y = document.getElementById(auxFree+auxNumMenos);
   // var y = document.getElementById(id);
    if (x.style.display === "none") {
      x.style.display = "inline";
    } else {
      x.style.display = "none";
    }
    if (y.style.display === "none") {
        y.style.display = "inline";
      } else {
        y.style.display = "none";
      }
}
  }

/*
 * Vacia todos los items drag
 */
UI.prototype.clear_drag = function() {
    var this_ui;
    this_ui = this;

    return function(event, ui) {
        var i, item;

        for (i = 0; i < this_ui.drag.length; i++) {
            item = this_ui.drag[i];
            // Quita las clases hover
            item.unbind('mouseenter').unbind('mouseleave');
            // Quita el highlight de las cartas
            $(this).removeClass('highlight');
            // Quita los double click
            item.unbind('dblclick');
            item.draggable('destroy');
        }
        // Vacia array de draggeables
        this_ui.drag.length = 0;

        // Vacia el array de droppeables asegurandose de que el array se vacía después de un drop valido
        this_ui.clear_drop();

        // crea nuevos dragables
        this_ui.create_draggables();
    };
};

/**
 * Vacía los dropables
 */
UI.prototype.clear_drop = function() {
    var i, item;

    for (i = 0; i < this.drop.length; i++) {
        item = this.drop[i];
        item.droppable('destroy');
        //item.droppable('disable');
    }
    // Vacia el array de dropables
    this.drop.length = 0;
};

UI.prototype.is_won = function() {
    if (this.game.is_game_won()) {
        this.win_animation();
        $('#windialog').dialog('open');
        //return false;
    }
};

/**
 * Anima las cartas al ganar un juego
 */
UI.prototype.win_animation = function() {
    var i, $card_div, this_ui, v_x;

    for (i = 0; i < 53; i++) {
        $card_div = $('#' + ((i + 4)%52 + 1));
        this_ui = this;
        v_x = 3 + 3*Math.random();

        // Esto es necesario por el IE ya que no podemos pasar parametros a una función en setTimeout.

        function animator($card_div, v_x, this_ui) {
            setTimeout(function() {
                this_ui.card_animation($card_div, v_x, 0, this_ui);
            }, 250*i);
        }
        animator($card_div, v_x, this_ui);
    }
};

/**
 * Animación de carta individual
 */
UI.prototype.card_animation = function($card_div, v_x, v_y, this_ui) {
    var pos, top, left, bottom;

    pos = $card_div.offset();
    top = pos.top;
    left = pos.left;

    // calcular nueva velocidad vertical v_y
    bottom = $(window).height() - 96; // 96 es el alto del div carta
    v_y += 0.5; // acceleration
    if (top + v_y + 3 > bottom) {
        // añade fricción y rebota la carta
        v_y = -0.75*v_y; // friction = 0.75
    }

    left -= v_x;
    top += v_y;
    $card_div.offset({top: top, left: left});
    if (left > -80) {
        // Solo continua animación se la carta es visible dentro del tablero
        setTimeout(function() {
            var cd = $card_div;
            this_ui.card_animation(cd, v_x, v_y, this_ui);
        }, 20);
    }
};

UI.prototype.setup_secret = function() {
    var this_ui = this;
    $('#secret').click(function() {
        this_ui.win_animation();
    });
};

/**
 * Show the win dialog box
 */
UI.prototype.win = function() {
    $('#windialog').dialog({
        title: 'Winner Winner Chicken Dinner',
        modal: true,
        show: 'blind',
        autoOpen: false,
        zIndex: 5000
    });
};

UI.prototype.add_cards_car = function(drag_id, drop_id){
    var img 
    year = ["1492","1789","1914","1936","1939","1945","1969","1989","1990","2001"]
    img = new Image();
 //   document.write(card_id)
 //celda se cambiará por drag_id, que será el id de la carta, este id será una fecha
 var x = document.getElementById("celda"+drop_id);

 for (i = 0; i < year.length; i++) {

    if(year[i] == drop_id){
        x.src =  'images/' + drag_id + 'b.png';
    }
}
}

/**
 * Dialogo de ayuda
 */
UI.prototype.help = function() {
    $('#helptext').dialog({
        title: 'Help',
        modal: true,
        show: 'blind',
        autoOpen: false,
        zIndex: 5000,
        minWidth: 550
    });

    $('#help').click(function() {
        $('#helptext').dialog('open');
    });

};

UI.prototype.new_game = function() {
    var this_ui = this;
    $('#newgame').click(function() {
        this_ui.game.reset();
        this_ui.remove_cards();
        this_ui.add_cards();
        this_ui.create_draggables();

    });
};

/******************************************************************************/

var my_ui;
$(document).ready(function() {
    //var g, my_ui;
    var g;

    g = new Game();
    my_ui = new UI(g);
    my_ui.init();
});