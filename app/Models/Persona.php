<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'persona';
    /**
     * Primary key column for this model.
     */
    protected $primaryKey = 'persona_id';

    /**
     * Let Eloquent know the primary key is an integer.
     */
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'persona_id', 'nombres', 'apellidos', 'genero', 'foto', 'domicilio',
        'documento_nacional_identidad', 'orcid', 'identificador_registro_personas',
        'scopus_author_id', 'research_id', 'isni',
        // UI fields
        'email', 'telefono', 'cargo', 'foto_path'
    ];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clienteProyectos()
    {
        return $this->hasMany('App\Models\ClienteProyecto', 'persona__persona_id', 'persona_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contactoProyectos()
    {
        return $this->hasMany('App\Models\ContactoProyecto', 'persona__persona_id', 'persona_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function coordProyPersonas()
    {
        return $this->hasMany('App\Models\CoordProyPersona', 'persona__persona_id', 'persona_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ejecutoraProyectos()
    {
        return $this->hasMany('App\Models\EjecutoraProyecto', 'persona__persona_id', 'persona_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entidadAmProyectos()
    {
        return $this->hasMany('App\Models\EntidadAmProyecto', 'persona__persona_id', 'persona_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entidadNoms()
    {
        return $this->hasMany('App\Models\EntidadNom', 'persona__persona_id', 'persona_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyInvestPrincipals()
    {
        return $this->hasMany('App\Models\ProyInvestPrincipal', 'investigador_id', 'persona_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyMiembros()
    {
        return $this->hasMany('App\Models\ProyMiembro', 'persona_id', 'persona_id');
    }
    
}
