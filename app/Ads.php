<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table= 'ads';
    public $timestamps = false;
    protected $searchable = [
        'tieu_de'
     ];
     protected function fullTextWildcards($term)
     {
         // removing symbols used by MySQL
         $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
         $term = str_replace($reservedSymbols, '', $term);
  
         $words = explode(' ', $term);
  
         foreach ($words as $key => $word) {
             /*
              * applying + operator (required word) only big words
              * because smaller ones are not indexed by mysql
              */
             if (strlen($word) >= 1) {
                 $words[$key] = '+' . $word  . '*';
             }
         }
         
         $searchTerm = implode(' ', $words);
  
         return $searchTerm;
     }
  
     public function scopeFullTextSearch($query, $columns, $term)
     {
         $query->whereRaw("MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)", $this->fullTextWildcards($term));
  
         return $query;
     }
}
