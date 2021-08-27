Tutorials::create([
'course_id' => 1,
'comment_id' => 2,
'name' => '11 Rare JavaScript One-Liners That Will Amaze You',
'slug' => '11-rare-javascript-one-liners-that-will-amaze-you',
'description' => '',
'author' => 'Programmer Zaman Now',
'type' => 'Article',
'level' => 'Beginner',
'submitted_by' => 'Ray',
'source_link' => 'https://betterprogramming.pub/11-rare-javascript-one-liners-that-will-amaze-you-331659832301',
'vote_id' => 1
]);
Voters::create([
'user_id' => 1,
'tutorials_id' => 1,
'vote' => 1
]);
