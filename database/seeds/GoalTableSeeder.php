<?php

use Illuminate\Database\Seeder;
use App\Core\Domain\Goal;
use App\Core\Domain\Objective;

class GoalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objective = Objective::where('description','=','Inglés - A2')->firstOrFail();

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'Presente Simple to be, to have, to have got',
            'approach'=> 43829
        ]);

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'Auxiliar do/does preguntas y negaciones',
            'approach'=> 43829
        ]);

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'Adjetivos posesivos',
            'approach'=> 43829
        ]);

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'Sustantivos: singular y plural',
            'approach'=> 43829
        ]);

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'Quantifiers: how much/many, some/any',
            'approach'=> 43829
        ]);

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'This/that, these/those',
            'approach'=> 43829
        ]);

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'Imperativos, let´s',
            'approach'=> 43829
        ]);

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'Expresión de la posesión (genitivo sajón)',
            'approach'=> 43829
        ]);

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'Adverbios de frecuencia y expresiones temporales',
            'approach'=> 43829
        ]);

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'Preposiciones de lugar y tiempo (in, on,at, to)',
            'approach'=> 43829
        ]);

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'Pasado Simple: “to be” y verbos de uso cotidiano',
            'approach'=> 43829
        ]);

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'Can/can´t ',
            'approach'=> 43829
        ]);

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'Presente Continuo',
            'approach'=> 43829
        ]);

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'There is/are, there was/there were, Artículos determinado e indeterminado',
            'approach'=> 43829
        ]);

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'Pronombres interrogativos',
            'approach'=> 43829
        ]);

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'Números ordinales y cardinale',
            'approach'=> 43829
        ]);

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'Conectores and, or, but.',
            'approach'=> 43829
        ]);

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'Pronombres personales.',
            'approach'=> 43829
        ]);

        Goal::create([
            'objective_id'=> $objective->id,
            'description'=> 'Pronombres objetos.',
            'approach'=> 43829
        ]);
        
        
    }
}
