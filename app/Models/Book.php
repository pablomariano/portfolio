<?php // Esto indica que el código PHP comioneza aquí

// Luego definimos un espacio de nombres para la clase Book
// que extiende o hereda la clase Models
namespace App\Models; 

use Illuminate\Database\Eloquent\Model;

//Crea la clase Book que hereda propiedades y métodos de Model 
class Book extends Model{ 
    
    protected $table = 'my_books';

}

?>