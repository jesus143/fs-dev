<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 20/02/2015
 * Time: 2:48 PM
 */




    include ("../../../../fs_folders/php_functions/Email/Email.php");

$email = new Email();

$email->sendInviteEmail3('brainOfFashion@gmail.com', 'mrjesuserwinsuarez@gmail.com', 'An Invitation to Share Your Blog Content on Fashion Sponge', 1, 0, 'Jesus');
$email->sendInviteEmail3('brainOfFashion@gmail.com', 'mrjesuserwinsuarez@gmail.com', 'An Invitation to Share Your Blog Content on Fashion Sponge', 1, 1, 'Jesus');
$email->sendInviteEmail3('brainOfFashion@gmail.com', 'mrjesuserwinsuarez@gmail.com', 'An Invitation to Share Your Blog Content on Fashion Sponge', 1, 2, 'Jesus');



$email->sendInviteEmail3('mrjesuserwinsuarez@gmail.com', 'brainoffashion@gmail.com', 'An Invitation to Share Your Blog Content on Fashion Sponge', 1, 0, 'Jesus');
$email->sendInviteEmail3('mrjesuserwinsuarez@gmail.com', 'brainoffashion@gmail.com', 'An Invitation to Share Your Blog Content on Fashion Sponge', 1, 1, 'Jesus');
$email->sendInviteEmail3('mrjesuserwinsuarez@gmail.com', 'brainoffashion@gmail.com', 'An Invitation to Share Your Blog Content on Fashion Sponge', 1, 2, 'Jesus');



