<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>বাংলাদেশ সংবাদ</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; padding: 20px; }
        .news-item { background: #fff; border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        .news-item img { max-width: 100%; height: auto; margin-bottom: 10px; }
        .news-item h2 { margin: 0 0 10px; }
        .meta { font-size: 0.85em; color: #555; margin-bottom: 10px; }
        .keywords span { background: #007bff; color: #fff; padding: 2px 6px; border-radius: 3px; margin-right: 5px; font-size: 0.8em; }
    </style>
</head>
<body>
    <h1>বাংলাদেশ সংবাদ</h1>

    @forelse($articles as $article)
        <div class="news-item">
            @if(!empty($article['image_url']))
                <img src="{{ $article['image_url'] }}" alt="{{ $article['title'] }}">
            @endif

            <h2>{{ $article['title'] }}</h2>

            <div class="meta">
                <span>প্রকাশক: {{ implode(', ', $article['creator'] ?? []) }}</span> |
                <span>উৎস: {{ $article['source_id'] ?? 'Unknown' }}</span> |
                <span>তারিখ: {{ $article['pubDate'] ?? 'N/A' }}</span>
            </div>

            <p><strong>বর্ণনা:</strong> {{ $article['description'] ?? 'N/A' }}</p>
            <p><strong>সম্পূর্ণ বিষয়বস্তু:</strong> {{ $article['content'] ?? 'N/A' }}</p>

            @if(!empty($article['keywords']))
                <div class="keywords">
                    <strong>Keywords:</strong>
                    @foreach($article['keywords'] as $keyword)
                        <span>{{ $keyword }}</span>
                    @endforeach
                </div>
            @endif

            <p><a href="{{ $article['link'] }}" target="_blank">বিস্তারিত পড়ুন</a></p>
        </div>
    @empty
        <p>কোনও খবর পাওয়া যায়নি।</p>
    @endforelse

</body>
</html>

