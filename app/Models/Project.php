<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Project extends Model
{
    use HasFactory;
    // protected $fillable = ['title','url','description']; //define las columnas que se pueden agregar a la base de datos
    // protected $guarded = ['id','created_at','updated_at']; //definimos las columnas que no se deben agregar manualmente TODO: por defecto
    protected $guarded = []; //quita las restricciones
    public function getRouteKeyName()
    {
        return 'url';
    }
}
