<?php

namespace web;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $fillable = [
        'descricao', 'sala_id', 'curso_id', 'servidor_id'
    ];

    public function curso()
    {
        return $this->belongsTo('web\Curso');
    }

    public function servidor()
    {
        return $this->belongsTo('web\Servidor');
    }

    public function sala()
    {
        return $this->belongsTo('web\Sala');
    }
<<<<<<< HEAD
     
        public function solicitacaos()
    {
        return $this->hasMany('web\Solicitacao');
    }

 
=======
    
    public function patrimonio()
    {
        return $this->belongsToMany('\web\Patrimonio');
    }
>>>>>>> 63298016783898f4d2b1242d524976cc9a3cf6c8
}
