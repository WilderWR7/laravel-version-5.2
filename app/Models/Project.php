<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $fillable = ['title','url','description']; //define las columnas que se pueden cambiar  a la base de datos
    // protected $guarded = ['id','created_at','updated_at']; //definimos las columnas que no se deben agregar manualmente TODO: por defecto

    protected $casts = [
        'created_at'=>'datetime'
    ];
    protected $guarded = []; //quita las restricciones
    public function getRouteKeyName()
    {
        return 'url';
    }

    public function category () {
        return $this->belongsTo(Category::class);
    }

}
