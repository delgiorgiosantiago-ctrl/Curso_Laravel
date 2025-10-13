@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/user/css/style_user.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/user/profiles/css/article_profile.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('title', 'Perfil')

@section('content')

<div class="profile-container">
    <div class="profile-header">
        <div class="profile-photo">
            <img src="{{ $profile->photo ? asset('storage/'.$profile->photo) : asset('img/user-default.png') }}" alt="Foto de perfil">
        </div>

        <div class="profile-info">
            <h2>{{ $profile->user->full_name }}</h2>
            <p><strong>Profesión:</strong> {{ $profile->user->profession }}</p>
            <p>{{ $profile->user->about }}</p>

            <div class="profile-links">
                <a href="{{ $profile->user->facebook }}" target="_blank">Facebook</a> |
                <a href="{{ $profile->user->twitter }}" target="_blank">Twitter</a> |
                <a href="{{ $profile->user->linkedin }}" target="_blank">LinkedIn</a>
            </div>

            @if ($profile->user_id == Auth::user()->id)
                <a href="{{ route('profiles.edit', $profile) }}" class="btn-edit">Editar Perfil</a>
            @endif
        </div>
    </div>

    {{-- Artículos publicados --}}
    @if (count($articles) > 0)
        <h3 class="title-section">Artículos publicados</h3>

        <div class="article-container">
            @foreach($articles as $article)
                <article class="article">
                    <img src="{{ asset('storage/'.$article->image) }}" class="img" alt="Imagen del artículo">

                    <div class="card-body">
                        <a href="{{ route('articles.show', $article) }}">
                            <h2 class="title">{{ Str::limit($article->title, 70, '...') }}</h2>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="links-paginate-profile">
            {{ $articles->links() }}
        </div>
    @endif
</div>

@endsection
