<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'proyectos';

    protected $fillable = [
        'proyecto_id', 'codigo', 'acronimo',
        'fecha_de_inicio', 'fecha_finalizacion',
        'pagina_web', 'mandato', 'uri',
        'tipo_proyecto_cod__tipo_cod', 'categoria_cod', 'estado_cod',
        // fields used by the simplified UI
        'nombre', 'descripcion', 'estado'
    ];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoriaProyectoCod()
    {
        return $this->hasOne('App\Models\CategoriaProyectoCod', 'categoria_cod', 'categoria_cod');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function clienteProyecto()
    {
        return $this->hasOne('App\Models\ClienteProyecto', 'proyecto_cliente_o_usuario_proyecto', 'proyecto_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contactoProyecto()
    {
        return $this->hasOne('App\Models\ContactoProyecto', 'proyecto_contacto_proyecto', 'proyecto_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function coordProyPersona()
    {
        return $this->hasOne('App\Models\CoordProyPersona', 'proyecto_coordinado_por_proyecto', 'proyecto_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ejecutoraProyecto()
    {
        return $this->hasOne('App\Models\EjecutoraProyecto', 'proyecto_enitidad_ejecutora_proyecto', 'proyecto_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function entidadAmProyecto()
    {
        return $this->hasOne('App\Models\EntidadAmProyecto', 'proyecto_proyecto_id', 'proyecto_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function entidadNom()
    {
        return $this->hasOne('App\Models\EntidadNom', 'proyecto_nom_proyecto', 'proyecto_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estadoProyectoCod()
    {
        return $this->hasOne('App\Models\EstadoProyectoCod', 'estado_cod', 'estado_cod');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyInvestPrincipals()
    {
        return $this->hasMany('App\Models\ProyInvestPrincipal', 'proyecto_id', 'proyecto_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proyMiembro()
    {
        return $this->hasOne('App\Models\ProyMiembro', 'proyecto_id', 'proyecto_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoProyectoCod()
    {
        return $this->hasOne('App\Models\TipoProyectoCod', 'tipo_cod', 'tipo_proyecto_cod__tipo_cod');
    }
    
}
