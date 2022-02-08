<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $desc_post
 * @property string $img_post
 * @property string $content
 * @property string $slug
 * @property int|null $publish_at
 * @property int $user_id
 * @property int $cate_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $status
 * @property int|null $view_count
 * @property string $seo_desc
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Post[] $post
 * @property-read int|null $post_count
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDescPost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImgPost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublishAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSeoDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereViewCount($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = ['title', 'desc_post', 'img_post', 'content', 'seo_desc' ,'slug', 'publish_at', 'user_id', 'cate_id', 'status', 'view_count'];


    public function post(){
        return $this->belongsToMany(Post::class, 'user_id', 'cate_id');
    }

    public function urlImg(){
        return $this->img_post;
    }
    public function postUrl(){
        return route('client.detail', ['slug_detail' => $this->slug, 'id' => $this->id]);
    }
}
