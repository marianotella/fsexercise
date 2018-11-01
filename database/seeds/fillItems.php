<?php

use App\Item;
use App\Services\PictureService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class fillItems extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
              'picture' => '/pictures/1.jpg',
              'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porta tristique iaculis. Praesent nisi metus, posuere vel eleifend vestibulum, sodales sed elit. Vivamus laoreet porttitor lectus, eu tincidunt elit fringilla at. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices volutpat.',
              'order' => 1
            ],
            [
                'picture' => '/pictures/2.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam, luctus eu lectus nec, tincidunt nullam.',
                'order' => 2
            ],
            [
                'picture' => '/pictures/3.jpg',
                'description' => 'Sed vitae nibh at elit aliquet viverra. Ut tincidunt odio id felis sagittis ultricies. Vivamus ullamcorper elit at orci euismod tempus. Nulla suscipit urna vitae urna volutpat.',
                'order' => 3
            ],
            [
                'picture' => '/pictures/4.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eu blandit velit. Etiam a orci mollis, vestibulum elit eget, volutpat neque. Cras lacinia diam in condimentum pretium. In aliquet arcu id tellus dignissim facilisis. Proin massa nunc.',
                'order' => 4
            ],
            [
                'picture' => '/pictures/5.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sem metus, volutpat ac dapibus amet.',
                'order' => 5
            ],
            [
                'picture' => '/pictures/6.jpg',
                'description' => 'Sed feugiat leo nec hendrerit interdum. Vestibulum ultricies, dui vitae vestibulum lobortis, eros urna eleifend ex, quis tempus felis augue eget magna. Cras a vestibulum odio.',
                'order' => 6
            ],
        ];

        foreach ($items as $item) {
            Item::create([
                'picture' => $item['picture'],
                'description' => $item['description'],
                'order' => $item['order'],
            ]);
        }
    }
}
