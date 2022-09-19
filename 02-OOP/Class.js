class EventEmitter {

    constructor() { }
    on(eventoNombre, callback) {
        console.log(eventoNombre)
        callback()
    }
    emit(eventoNombre) {
        this.on(eventoNombre.Titulo, eventoNombre.play)
    }
    off(eventoNombre, callback) {
        console.log(eventoNombre)
        callback.pause()
    }

}
////////////////////////////////////////
class Logger {
    constructor() { }
    log(info) {
        console.log("The 'play' event has been emitted")
    }
}
let Logger1 = new Logger()

////////////////////////////////////////
class Pelicula extends EventEmitter {
    constructor(titulo, año, duracion) {
        super()
        this.Titulo = titulo;
        this.Año = año;
        this.Duracion = duracion;
        this.Actores = [];
    }
    play() {
        Logger1.log()
    }
    pause() {
        console.log("pause movie")
    }
    resumen() {
        console.log("resumen of movie")
    }
    addCast(nameActor) {
        if (Array.isArray(nameActor)) {
            nameActor.map(e => this.Actores.push(e.Nombre))
        } else {
            this.Actores.push(nameActor.Nombre)
        }
    }

}

let Xmen = new Pelicula("X-MEN", "2000", "104 min");
Xmen.emit(Xmen)
///////////////////////////////////////////////////

class Actor {
    constructor(nombre, edad) {
        this.Nombre = nombre;
        this.Edad = edad;
    }
}

let actors = [

    new Actor('Paul Winfield', 50),

    new Actor('Michael Biehn', 50),

    new Actor('Linda Hamilton', 50)

];
Xmen.addCast(actors)
console.log(Xmen.Actores)






