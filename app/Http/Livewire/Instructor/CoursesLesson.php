<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Lesson;
use App\Models\Platform;
use App\Models\Section;
use Livewire\Component;

class CoursesLesson extends Component
{

    public $section, $lesson, $platforms;

    public $name, $platform_id=1, $url;

    protected $rules = [ // Reglas de validación para el formulario de creación de lecciones

        'lesson.name' => 'required',
        'lesson.platform_id' => 'required',
        'lesson.url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x']

    ];

    public function mount(Section $section){
        $this->section = $section; // Se obtiene la sección a la que pertenece la lección
        $this->lesson = new Lesson(); // Se crea una nueva lección
        $this->platforms = Platform::all(); // Se obtienen todas las plataformas
    }

    public function render()
    {
        return view('livewire.instructor.courses-lesson');
    }

    public function edit(Lesson $lesson){
        $this->resetValidation(); // Se resetea la validación
        $this->lesson = $lesson; // Se obtiene la lección a editar
    }

    public function update(){
        if($this->lesson->platform_id ==2){
            $this->rules['lesson.url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        }
        $this->validate();
        $this->lesson->save();
        $this->lesson = new Lesson();
        // $this->emit('lessonUpdated');
        $this->section = Section::find($this->section->id);
    }
    public function cancel(){
        
        $this->lesson = new Lesson();
    }
    public function store(){
        $rules =[ // Reglas de validación para el formulario de creación de lecciones 
            'name' => 'required',
            'platform_id' => 'required',
            'url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'] // Regla para validar la url de youtube
        ];
        if ($this->platform_id == 2) { // Si la plataforma es Vimeo se agrega la regla de validación
            $rules['url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        }
        $this->validate($rules);
        Lesson::create([
            'name' => $this->name,
            'platform_id' => $this->platform_id,
            'url' => $this->url,
            'section_id' => $this->section->id
        ]);
        $this->reset(['name', 'platform_id', 'url']); // Se resetea el formulario de creación de lecciones para que no queden datos en el mismo
        $this->section = Section::find($this->section->id);

    }
    public function destroy(Lesson $lesson ){
        $lesson->delete();
        $this->section = Section::find($this->section->id); 
    }
}
