<?php
/**
Copyright [2021] [Javier Linares Castrillón]
Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at
http://www.apache.org/licenses/LICENSE-2.0
Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
 */

/**
 * Class
 */
class Pages extends Controller {

    public function __construct(){

    }

    public function index(){

        if(isLoggedIn()){
            redirect('posts');
        }

        $data = [
            'title' => 'Dundalk´s Erasmus Hub',
            'description' => 'Social network to share your experiences during your Erasmus in Dundalk'
        ];

        $this -> view('pages/index', $data);
    }

    public function situation(){
        $desc = 'Dundalk is located halfway between Dublin and Belfast. This makes it an excellent meeting point for businesses. 
                    It’s a big town with a young student atmosphere.';

        $data = [
            'title' => 'Where is Dundalk',
            'description' => $desc
        ];
        $this -> view('pages/situation', $data);
    }

}