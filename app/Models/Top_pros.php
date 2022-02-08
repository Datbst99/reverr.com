<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Top_pros
 *
 * @property int $id
 * @property string $img_pro
 * @property string $name
 * @property int $current_price
 * @property int $old_price
 * @property string $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|Top_pros newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Top_pros newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Top_pros query()
 * @method static \Illuminate\Database\Eloquent\Builder|Top_pros whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Top_pros whereCurrentPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Top_pros whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Top_pros whereImgPro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Top_pros whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Top_pros whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Top_pros whereOldPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Top_pros whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Top_pros whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Top_pros extends Model
{
    use HasFactory;
    protected $fillable = ['img_pro', 'name', 'current_price', 'old_price', 'link', 'status', 'cate_id'];


    public function urlDelete(){
        return route('product.delete', ['id' => $this->id]);
    }
    public function urlEdit(){
        return route('product.edit', ['id' => $this->id]);
    }
}
