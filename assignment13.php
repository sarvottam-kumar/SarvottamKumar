<?php
session_start();

$questions = [
    [
        "q" => "What does HTML stand for?",
        "options" => ["Hyper Text Markup Language", "High Text Machine Language", "Hyperlinks Text Mark Language", "Home Tool Markup Language"],
        "ans" => 0
    ],
    [
        "q" => "Which language is used for styling web pages?",
        "options" => ["HTML", "JQuery", "CSS", "XML"],
        "ans" => 2
    ],
    [
        "q" => "Which is not a programming language?",
        "options" => ["Python", "Java", "HTML", "C"],
        "ans" => 2
    ],
    [
        "q" => "CSS stands for?",
        "options" => ["Color Style Sheet", "Cascading Style Sheet", "Computer Style Sheet", "Creative Style Sheet"],
        "ans" => 1
    ],
    [
        "q" => "JavaScript is a ___ language",
        "options" => ["Markup", "Programming", "Styling", "Database"],
        "ans" => 1
    ],
    [
        "q" => "Which tag is used for link?",
        "options" => ["a", "link", "href", "url"],
        "ans" => 0
    ],
    [
        "q" => "Which company developed Java?",
        "options" => ["Google", "Sun Microsystems", "Microsoft", "Apple"],
        "ans" => 1
    ],
    [
        "q" => "Which is an OS?",
        "options" => ["HTML", "Linux", "Google", "CSS"],
        "ans" => 1
    ],
    [
        "q" => "RAM is ____ memory",
        "options" => ["Permanent", "Temporary", "Secondary", "Offline"],
        "ans" => 1
    ],
    [
        "q" => "PHP is a ____ language",
        "options" => ["Client-side", "Server-side", "Markup", "Styling"],
        "ans" => 1
    ]
];

if (!isset($_SESSION['index'])) {
    $_SESSION['index'] = 0;
    $_SESSION['score'] = 0;
}

if (isset($_POST['next'])) {
    if (isset($_POST['option'])) {
        if ($_POST['option'] == $questions[$_SESSION['index']]['ans']) {
            $_SESSION['score']++;
        }
    }
    $_SESSION['index']++;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">

            <?php if ($_SESSION['index'] < count($questions)) { ?>

                <h5 class="mb-3">
                    Question <?php echo $_SESSION['index'] + 1; ?>:
                    <?php echo $questions[$_SESSION['index']]['q']; ?>
                </h5>

                <form method="post">
                    <?php foreach ($questions[$_SESSION['index']]['options'] as $i => $opt) { ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="option" value="<?php echo $i; ?>" required>
                            <label class="form-check-label"><?php echo $opt; ?></label>
                        </div>
                    <?php } ?>

                    <button type="submit" name="next" class="btn btn-primary mt-3">
                        Next
                    </button>
                </form>

            <?php } else { ?>

                <h3 class="text-center">Quiz Completed 🎉</h3>
                <h4 class="text-center">
                    Your Score: <?php echo $_SESSION['score']; ?> / <?php echo count($questions); ?>
                </h4>

                <?php session_destroy(); ?>

            <?php } ?>

        </div>
    </div>
</div>

</body>
</html>