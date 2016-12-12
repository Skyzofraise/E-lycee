<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Supprimer les image avant si le dossier image est non vide
        $upload = public_path('images'); // chemin du dossier images dans dossier public
        $files = File::allFiles($upload);

        foreach ($files as $file) {
            File::delete($file);
        }

        // Pour chaque post creer (each) on associe une image
        factory(App\Post::class, 8)->create()->each(function($post) use($upload) {
            // Recuperer le fichier source sur le web
            $fileName = file_get_contents('http://lorempicsum.com/futurama/400/200/'.rand(1,9));

            // enregistre l'image dans le dossier images du dossier public

            $uri = str_random(30). '.jpg'; // nom d'image aleatoire

            File::put(
                $upload.'/'.$uri, $fileName
            );

            // modifie la valeur du champs url_thumbnail pour ce post
            $post->url_thumbnail = $uri;

            $post->save();

            $table = range(1, 10);
            $shuffle = shuffle($table);
            $tags = array_slice($table, rand(1,5));

            $post->tags()->attach($tags);
        });
    }
}
