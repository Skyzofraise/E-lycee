<?php
use App\Choice;
use App\User;
use Illuminate\Database\Seeder;

class ChoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('choices')->delete();
        $json = File::get("database/data/choices.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
          Choice::create(array(
            'id' => $obj->id,
            'question_id' => $obj->question_id,
            'content' => $obj->content,
            'status' => $obj->status,
            'created_at' => $obj->created_at,
            'updated_at' => $obj->updated_at
          ));
        }
    }
}
