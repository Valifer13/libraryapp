<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'author',
        'isbn',
        'cover',
        'published_year',
        'description',
        'stock',
        'category_id',
    ];

    public function addWishlistBy(User $user) {
        Wishlist::query()->create([
            'user_id' => $user->id,
            'book_id' => $this->id
        ]);
    }

    public function BorrowedBy(User $user)
    {
        Loan::query()->create([
            'book_id' => $this->id,
            'user_id' => $user->id,
            'admin_id' => Admin::first()->id,
            'borrow_date' => now(),
            'due_date' => now()->addDays(7),
        ]);

        $this->stock -= 1;
        $this->save();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function wishlists(): HasMany 
    {
        return $this->hasMany(Wishlist::class);
    }

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }
}
