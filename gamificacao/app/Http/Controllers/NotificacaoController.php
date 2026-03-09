<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificacao;
use Illuminate\Support\Facades\Auth;

class NotificacaoController extends Controller
{
    public function index()
    {
        if (Auth::guard('web')->check()) {
            $notificacoes = Notificacao::where('fk_id_aluno', Auth::guard('web')->user()->id_aluno)
                ->where('lida', false)
                ->orderBy('created_at', 'desc')
                ->get();
        } elseif (Auth::guard('instrutor')->check()) {
            $notificacoes = Notificacao::where('fk_id_instrutor', Auth::guard('instrutor')->user()->id_instrutor)
                ->where('lida', false)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            return response()->json([]);
        }

        return response()->json($notificacoes);
    }

    public function marcarLida($id)
    {
        $notificacao = Notificacao::findOrFail($id);
        $notificacao->update(['lida' => true]);
        return response()->json(['success' => true]);
    }

    public function marcarTodasLidas()
    {
        if (Auth::guard('web')->check()) {
            Notificacao::where('fk_id_aluno', Auth::guard('web')->user()->id_aluno)
                ->where('lida', false)
                ->update(['lida' => true]);
        } elseif (Auth::guard('instrutor')->check()) {
            Notificacao::where('fk_id_instrutor', Auth::guard('instrutor')->user()->id_instrutor)
                ->where('lida', false)
                ->update(['lida' => true]);
        }

        return response()->json(['success' => true]);
    }
}