<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class ProjekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $projek = [
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '1.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '2.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '3.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '1.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '2.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '3.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '1.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '2.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '3.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '1.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '2.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '3.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '1.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '2.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '3.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '1.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '2.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '3.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '1.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '2.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '3.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '1.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '2.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '3.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '1.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '2.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
            [
                'judul' => $faker->name(),
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, necessitatibus?',
                'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quia! Distinctio et velit, atque expedita odit aliquid soluta dolorum doloremque incidunt saepe voluptatum vitae sunt magni nulla minus quae provident quo? Quas aut rerum dolorem obcaecati illum at, pariatur totam provident sed dolor officia! Nisi, officia totam, fugiat vel harum dolores placeat eius ducimus modi <img src= "https://source.unsplash.com/1280x720/?tech" alt="">
                quod, nihil non cumque quae et cum laudantium cupiditate! Error nam repudiandae beatae facilis sapiente exercitationem, consequatur dolor velit, harum deleniti debitis in impedit fugiat labore omnis libero. Ab eos quisquam, accusamus voluptatum eaque numquam sed quam veritatis eum accusantium optio nostrum illum, dicta perspiciatis.',
                'foto' => '3.jpg',
                'platform_projek_id' => rand(1, 3)
            ],
        ];
        DB::table('projek')->insert($projek);
    }
}
