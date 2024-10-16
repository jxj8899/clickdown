<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CLICKDOWN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://unpkg.com/tabulator-tables@6.3.0/dist/css/tabulator.min.css" rel="stylesheet">
<script type="text/javascript" src="https://unpkg.com/tabulator-tables@6.3.0/dist/js/tabulator.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=VT323&display=swap');
        .slider-container {
            margin-bottom: 20px;
        }
        .selected-value {
            font-size: 1.5em;
            font-weight: bold;
        }
        :root {
            --primary-color: #00ff00;
            --secondary-color: #ff00ff;
            --background-color: #000000;
            --text-color: #ffffff;
            --border-color: #333333;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .paper-plane {
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 20px solid white;
            position: relative;
            margin-right: 8px;
        }

        .paper-plane::before {
            content: '';
            position: absolute;
            top: 0;
            left: -10px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid white;
            transform: rotate(-45deg);
        }

        .paper-plane::after {
            content: '';
            position: absolute;
            top: 0;
            left: 10px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid white;
            transform: rotate(45deg);
        }


        body {
            font-family: 'VT323', monospace;
            background-color: black !important;
            color: white !important;
            line-height: 1.6;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        nav {
            background-color: rgba(0, 255, 0, 0.1);
            border: 1px solid var(--primary-color);
            margin-bottom: 20px;
        }

        nav ul {
            display: flex;
            justify-content: space-around;
            list-style-type: none;
            padding: 10px 0;
        }

        nav a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 1.2em;
            transition: all 0.3s ease;
        }

        nav a:hover {
            color: var(--secondary-color);
            text-shadow: 0 0 10px var(--secondary-color);
        }

        .content {
            display: flex;
            gap: 20px;
        }

        aside {
            flex: 1;
        }

        main {
            flex: 2;
            border: 1px solid var(--border-color);
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.05);
        }

        .widget {
            border: 1px solid var(--border-color);
            margin-bottom: 20px;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.5);
        }

        h1, h2, h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .link-list ul {
            list-style-type: none;
        }

        .glitch-link {
            color: var(--text-color);
            text-decoration: none;
            position: relative;
            display: inline-block;
            padding: 5px 0;
            overflow: hidden;
        }

        .glitch-link::before,
        .glitch-link::after {
            content: attr(data-text);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--background-color);
        }

        .glitch-link::before {
            left: 2px;
            text-shadow: -2px 0 var(--secondary-color);
            clip: rect(24px, 550px, 90px, 0);
            animation: glitch-anim-2 3s infinite linear alternate-reverse;
        }

        .glitch-link::after {
            left: -2px;
            text-shadow: -2px 0 var(--primary-color);
            clip: rect(85px, 550px, 140px, 0);
            animation: glitch-anim 2.5s infinite linear alternate-reverse;
        }

        @keyframes glitch-anim {
            0% {
                clip: rect(19px, 9999px, 44px, 0);
            }
            100% {
                clip: rect(63px, 9999px, 99px, 0);
            }
        }

        @keyframes glitch-anim-2 {
            0% {
                clip: rect(79px, 9999px, 13px, 0);
            }
            100% {
                clip: rect(27px, 9999px, 85px, 0);
            }
        }

        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            border-top: 1px solid var(--border-color);
        }

        #system-status, #encrypted-messages, #glitch-terminal, #reality-distortion {
            height: 200px;
            overflow-y: auto;
            font-size: 0.9em;
            padding: 10px;
            background-color: rgba(0, 255, 0, 0.1);
            border: 1px solid var(--primary-color);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .content {
                flex-direction: column;
            }
            
            aside, main {
                width: 100%;
            }
        }
    </style>
</head>

<h1 class="text-center p-4">CLICKDOWN</h1>
<nav class="container">
    <ul>
        <li><a href="/">HOME</a></li>
        <li><a href="/history">HISTORY</a></li>
    </ul>
</nav>