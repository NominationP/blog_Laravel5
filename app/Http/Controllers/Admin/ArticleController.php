<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return view('admin/article/index')->withArticles(Article::all());
    }

    public function create()
    {
        return view('admin/article/create');
    }

    public function edit($id)
    {
        return view('admin/article/edit')->withArticle(Article::find($id));
    }

    public function store(Request $request) // Laravel ������ע��ϵͳ���Զ���ʼ��������Ҫ�� Request ��
    {
        // ������֤
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255', // ����� articles ����Ψһ����󳤶� 255
            'body' => 'required', // ����
        ]);

        // ͨ�� Article Model ����һ�����ݽ� articles ��
        $article = new Article; // ��ʼ�� Article ����
        $article->title = $request->get('title'); // �� POST �ύ���˵� title �ֶε�ֵ���� article �� title ����
        $article->body = $request->get('body'); // ͬ��
        $article->user_id = $request->user()->id; // ��ȡ��ǰ Auth ϵͳ��ע����û��������� id ���� article �� user_id ����

        // �����ݱ��浽���ݿ⣬ͨ���жϱ�����������ҳ����в�ͬ��ת
        if ($article->save()) {
            return redirect('admin/article'); // ����ɹ�����ת�� ���¹��� ҳ
        } else {
            // ����ʧ�ܣ�������·ҳ�棬�����û������룬��������ʾ
            return redirect()->back()->withInput()->withErrors('����ʧ�ܣ�');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:articles,title,'.$id.'|max:255',
            'body' => 'required',
        ]);

        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->body = $request->get('body');

        if ($article->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('����ʧ�ܣ�');
        }
    }

    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('ɾ���ɹ���');
    }
}
