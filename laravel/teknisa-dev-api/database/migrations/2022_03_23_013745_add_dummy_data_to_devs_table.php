<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDummyDataToDevsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('devs', function (Blueprint $table) {
            //
        });
    
        require_once 'vendor/autoload.php';

        $faker = Faker\Factory::create();
       
        $allProgrammingLanguages = ['Java', 'JavaScript', 'PHP', 'Python'];

        $name = [];
        $email = [];
        $age = [];
        $pictures = [];
        $programmingLanguages = [];
        $description = [];
        for($i=0;$i<20;$i++){
            $name[] = $faker->name();
            $email[] = $faker->email();
            $age[] = rand(20, 60); 
            $description[] = $faker->text();
            $programmingLanguages[$i] = '[';
            for($j=0;$j<rand(1,4);$j++) {
                $programmingLanguages[$i] .= '"'. $allProgrammingLanguages[rand(0,3)] . '", ';
            }

            $programmingLanguages[$i] = substr($programmingLanguages[$i], 0, strlen($programmingLanguages[$i])-2);
            $programmingLanguages[$i] .= ']';
            

        }

        $pictures = [
            'https://picsum.photos/200',
            'https://picsum.photos/300',
            'https://picsum.photos/400',
            'https://picsum.photos/500',
            'https://picsum.photos/600',
            'https://picsum.photos/700',
            'https://picsum.photos/100',
            'https://picsum.photos/110',
            'https://picsum.photos/220',
            'https://picsum.photos/560',
            'https://picsum.photos/120',
            'https://picsum.photos/10',
            'https://picsum.photos/20',
            'https://picsum.photos/8',
            'https://picsum.photos/105',
            'https://picsum.photos/102',
            'https://picsum.photos/870',
            'https://picsum.photos/4',
            'https://picsum.photos/12',
            'https://picsum.photos/9',
        ];
        // $pictures = [
        //     "0998af83-c068-4d40-9ba0-1f954b001999.jpg",
        //     "0d8b5fe0-e261-470c-a2c7-4b881530b0de.jpg",
        //     "2c219c5e-fa87-4332-873a-b4f6d6fa18d7.jpg",
        //     "2d545821-f25f-412e-aa6a-75f6974b488f.jpg",
        //     "3017574a-3a7a-43a0-b183-bbf54cacd2f5.jpg",
        //     "36392ffd-052e-41cf-a3f5-e574bef212b2.jpg",
        //     "409121d1-96c1-4297-8102-afb2b284ac68.jpg",
        //     "5ed1bbf7-5291-48af-b7ac-f74a9010ac9e.jpg",
        //     "6826ed3d-aec8-4172-a15d-c5b8711b47f6.jpg",
        //     "812f9b39-028e-458c-b0d0-07dc1a7a209f.jpg",
        //     "9772cb64-dbbf-4142-b4f7-d3098b81caf6.jpg",
        //     "a7feccaa-59a5-4e76-b6c0-88fabbd30063.jpg",
        //     "a9518d4f-85ae-4ec0-a59c-b29a57200822.jpg",
        //     "aaf193ee-9572-4464-86c1-29ad54d181d1.jpg",
        //     "b42bc15a-a333-416e-bc87-46074328e45d.jpg",
        //     "bb183066-8b7f-416a-ab01-0acdddc024dc.jpg",
        //     "bb870004-7517-400d-968d-87681d30c7ed.jpg",
        //     "e2d18d87-1b5f-4215-aac4-79539d82e952.jpg",
        //     "f2ed875f-a538-4349-a933-4201df4548b4.jpg",
        //     "fadfc413-2653-4fb0-8f65-c8fc678a386e.jpg",
        // ];

        for($i=0;$i<20;$i++){
            DB::table('devs')->insert(
                array(
                    'name' => $name[$i],
                    'email' => $email[$i],
                    'age' => $age[$i],
                    'picture' => $pictures[$i],
                    'programmingLanguages' => $programmingLanguages[$i],
                    'description' => $description[$i],
                )
            );
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('devs', function (Blueprint $table) {
            //
        });
    }
}
