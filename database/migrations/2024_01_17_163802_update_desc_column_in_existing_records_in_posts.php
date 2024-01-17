<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Post;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $records = Post::all();

            foreach ($records as $record) {
                $link = $record->link;
                $desc = $this->getDescriptionFromAPI($link);

                $record->update(['desc' => $desc]);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // nothing
        });
    }

    private function getDescriptionFromAPI($link)
    {
        // get from VRChat server
        $ch = curl_init(); // init curl session

        $url_raw = $link;
        $url_worldId = str_replace("https://vrchat.com/home/world/", "", $url_raw);
        $url = "https://api.vrchat.cloud/api/1/worlds/".$url_worldId;
        curl_setopt($ch, CURLOPT_URL, $url); // specify url
        $userAgent = "Laravel/1.0 (bardblue0821@gmail.com)";
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent); // specify user agent
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($ch); // get info from url
        $world_data = json_decode($res, true);

        curl_close($ch); // end session

        return $world_data['description'];
    }
};