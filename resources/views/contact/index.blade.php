@extends('layouts.app')

@section('content')
<div class="mt-5">
    <h2 class="text-center fw-bold mb-0">問い合わせ内容一覧</h2>
</div>

@if ($contacts->isEmpty())
    <div class="mt-5">
        <p class="text-center text-muted">現在、問い合わせ内容はありません。</p>
    </div>
@else

    <!-- 検索フォーム -->
    <div class="mt-5">
        <form method="GET" action="{{ route('contact.index') }}" class="row g-3">
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">氏名</label>
                <div class="col-md-4">
                    <input type="text" name="name" id="name" class="form-control" placeholder="氏名"
                        value="{{ request('name') }}">
                </div>
                <label for="email" class="col-md-2 col-form-label">メールアドレス</label>
                <div class="col-md-4">
                    <input type="email" name="email" id="email" class="form-control" placeholder="メールアドレス"
                        value="{{ request('email') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="company" class="col-md-2 col-form-label">会社名</label>
                <div class="col-md-4">
                    <input type="text" name="company" id="company" class="form-control" placeholder="会社名"
                        value="{{ request('company') }}">
                </div>
                <label for="message" class="col-md-2 col-form-label">問い合わせ内容</label>
                <div class="col-md-4">
                    <input type="text" name="message" id="message" class="form-control" placeholder="問い合わせ内容"
                        value="{{ request('message') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="from_date" class="col-md-2 col-form-label">開始日</label>
                <div class="col-md-4">
                    <input type="date" name="from_date" id="from_date" class="form-control"
                        value="{{ request('from_date') }}">
                </div>
                <label for="to_date" class="col-md-2 col-form-label">終了日</label>
                <div class="col-md-4">
                    <input type="date" name="to_date" id="to_date" class="form-control" value="{{ request('to_date') }}">
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary shadow-sm">検索</button>
            </div>
        </form>
    </div>
    <!-- レスポンシブテーブル -->
    <div class="mt-3">
        <div class="table-responsive" style="min-width: 430px;">
            <table class="table table-bordered table-hover table-striped align-middle">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th style="width: 5%;">ID</th>
                        <th style="width: 15%;">氏名</th>
                        <th style="width: 20%;" class="text-nowrap">メールアドレス</th>
                        <th style="width: 20%;" class="text-nowrap">会社名</th>
                        <th style="width: 25%;">問い合わせ内容</th>
                        <th style="width: 15%;">送信日時</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td class="text-center">{{ $contact->id }}</td>
                            <td>{{ $contact->name }}</td>
                            <td class="text-break">{{ $contact->email }}</td>
                            <td>{{ $contact->company ?? '会社名なし' }}</td>
                            <td>
                                <span title="{{ $contact->message }}">
                                    {{ Str::limit($contact->message, 50, '...') }}
                                </span>
                                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modal{{ $contact->id }}">
                                    詳細
                                </button>
                            </td>
                            <td class="text-center">{{ $contact->created_at->format('Y年m月d日 H時i分') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- ページネーション -->
    <div class="d-flex justify-content-center mt-4">
        {{ $contacts->links('vendor.pagination.bootstrap-5') }}
    </div>

    <!-- モーダル -->
    @foreach ($contacts as $contact)
        <div class="modal fade" id="modal{{ $contact->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $contact->id }}"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel{{ $contact->id }}">問い合わせ内容の詳細</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>名前:</strong> {{ $contact->name }}</p>
                        <p><strong>メールアドレス:</strong> {{ $contact->email }}</p>
                        <p><strong>会社名:</strong> {{ $contact->company ?? '会社名なし' }}</p>
                        <p><strong>問い合わせ内容:</strong></p>
                        <p>{{ $contact->message }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endif
@endsection