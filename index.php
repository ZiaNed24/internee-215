<!DOCTYPE html>
<html>
<head>
    <title>Word Count Tool</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        h1 {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 10px;
        }
        
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
        }
        
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        h2 {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Word Count Tool</h1>
    <form action="" method="post">
        <textarea name="text" rows="10" cols="40"></textarea><br>
        <input type="submit" value="Count Words">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST["text"];
        // Remove special characters and extra whitespaces
        $text = preg_replace('/[^A-Za-z0-9\s]/', '', $text);
        $text = preg_replace('/\s+/', ' ', $text);
        $text = trim($text);
        
        // Count words
        $wordCount = str_word_count($text);
        
        // Count characters
        $charCount = strlen($text);
        
        // Count sentences (assuming a sentence ends with ".", "!", or "?")
        $sentenceCount = preg_match_all('/[.!?]/', $text, $matches);
        
        // Count paragraphs (assuming paragraphs are separated by two or more newlines)
        $paragraphCount = preg_match_all('/\n{2,}/', $text, $matches);
        
        echo "<h2>Word Count: $wordCount</h2>";
        echo "<h2>Character Count: $charCount</h2>";
        echo "<h2>Sentence Count: $sentenceCount</h2>";
        echo "<h2>Paragraph Count: $paragraphCount</h2>";
    }
    ?>
</body>
</html>
