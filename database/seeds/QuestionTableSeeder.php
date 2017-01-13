<?php
use App\Question;
use App\User;
use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->delete();
        $json = File::get("database/data/questions.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
          Question::create(array(
            'id' => $obj->id,
            'user_id' => $obj->user_id,
            'title' => $obj->title,
            'content' => $obj->content,
            'class_level' => $obj->class_level,
            'status' => $obj->status,
            'created_at' => $obj->created_at,
            'updated_at' => $obj->updated_at
          ));
        }
    }
}
