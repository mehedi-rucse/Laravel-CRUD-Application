Web Engineering Final Task Documentation

1. Create a laravel project with the  following command:
    php artisan create-project laravel/laravel project-name

2. Configure the .env file such as renaming the database name, if the key is not generated, use the following command:
    php artisan key:generate

3. Now migrate  the initial migration provided with the laravel project:
    php artisan migrate

4. Now create a Model for example Book with the following command:
    php artisan make:model Book

5. Now create the controller BookController associated  with the Book model by the following command
    php artisan make:controller BookController –model=Book

6. Now create a migration for the books table which is associated with the Book Model by default.
    php artisan make:migration create_books_table

7. Now configure the migration file as the table schema is defined such as:
    Schema::create('books', function (Blueprint $table) {
                    $table->id();
                    $table->string('title');
                    $table->string('author');
                    $table->string('isbn');
                    $table->float('price');
                    $table->integer('available');
                    $table->timestamps();
            });
8. Now migrate  the create_books_table migration provided with the laravel project:
    php artisan migrate

9. Now we have to define the route in which we want to see the book list, by configuring the routes/web.php file.
   use App\Http\Controllers\BookController;
   Route::get('/books',[BookController::class, 'index'])->name('books.index');

10. Now we have to configure the index function of the BookController class for showcasing all the book lists.
11. Now there is no data in the books table, we have to use a factory and seeder to auto generate some data using the faker package.  
    a. For the factory, use the following command: 
            php artisan make:factory BookFactory --model=Book

    b. Then define the faker properties in the definition function:
    return [
                'title' => fake()->name(),
                'author' => fake()->unique()->name(),
                'isbn' => fake()->isbn13(),
                'price' => fake()->randomFloat(2, 10, 1000), // (no. of digits, min. max)
                'available' => fake()->numberBetween(0,10),
            ];
    c. Then  create a seeder such as BookSeeder:
            php artisan make:seeder BookSeeder
            \App\Models\Book::factory(100)->create();

    d. Call the BookSeeder class from the DatabaseSeeder class:
    $this->call(BookSeeder::class);


    e. Now run the seeder with the following command:
    php artisan db:seed

12. Configure the App\Providers\appServiceProvider class to enable bootstrap pagination:
    \Illuminate\Pagination\Paginator::useBootstrap();
    Use books->links() to implement it after the table.
