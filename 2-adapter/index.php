<?php
// Adaptor Design: 8G memory card => plugin(this is adaptor) => PC
require './vendor/autoload.php';

use Acme\Book;
use Acme\Kindle;
use Acme\KindleAdapter;
use Acme\Nook;
use Acme\Person;

(new Person)->read(new Book);
(new Person)->read(new KindleAdapter(new Kindle));
(new Person)->read(new KindleAdapter(new Nook));
