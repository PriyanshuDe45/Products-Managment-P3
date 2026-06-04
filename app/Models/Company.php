<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = ['is_active' => 'boolean'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function owner()
    {
        return $this->hasOne(Person::class)->where('type', 'owner');
    }

    public function contact()
    {
        return $this->hasOne(Person::class)->where('type', 'contact');
    }

    public function deactivate()
    {
        $this->update(['is_active' => false]);
        $this->products()->delete();
    }
    public function people()
    {
        return $this->hasMany(Person::class);
    }
}
