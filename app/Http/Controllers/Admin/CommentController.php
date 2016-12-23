<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comment;

class CommentController extends Controller
{

    public function index()
    {
        return view('admin/comment/index')->withComments(Comment::all());
        // return view('admin/comment/index')->withComments(Comment::with('hasOneArticle')->get());

    }

    public function edit($id)
    {
        return view('admin/comment/edit')->withComment(Comment::find($id));
    }



    public function update(Request $request, $id)
    {
        // 数据验证
        $this->validate($request, [
            'nickname' => 'required|max:255', // 必填、在 comments 表中唯一、最大长度 255
            'content' => 'required', // 必填
        ]);

        $comment = Comment::find($id);
        $comment->nickname = $request->get('nickname'); // 将 POST 提交过了的 title 字段的值赋给 comment 的 title 属性
        $comment->email = $request->get('email'); // 同上
        $comment->website = $request->get('website');
        $comment->content = $request->get('content');

        if ($comment->save()) {
            return redirect('admin/comment');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
    }

    public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }


}
