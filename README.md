# Fetch-PHP

<div align="center">

![License](https://img.shields.io/github/license/rayblair06/fetch-php)
![Issues](https://img.shields.io/github/issues/rayblair06/fetch-php)
![Forks](https://img.shields.io/github/forks/rayblair06/fetch-php)
![Stars](https://img.shields.io/github/stars/rayblair06/fetch-php)

</div>

## Table of Contents

- [About the Project](#about-the-project)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)
- [Acknowledgements](#acknowledgements)

## About the Project

**A functional way to make HTTP Requests in PHP!**

This package is lightweight and has no dependencies, enabling developers to make HTTP requests in a clean and functional manner!

## Installation

### Prerequisites

- Composer

### Installation

1. Install via Composer:
    ```bash
    composer require rayblair/fetch-php
    ```
2. **That's it!** You're ready to start making HTTP requests.

## Usage

### GET Request

```bash
try {
    $response = fetch('https://jsonplaceholder.typicode.com/posts/1');

    echo $response;
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
```

### POST Request

```bash
try {
    $response = fetch('https://jsonplaceholder.typicode.com/posts', [
        'method' => 'POST',
        'headers' => [
            'Content-type: application/json; charset=UTF-8'
        ],
        'body' => [
            'title' => 'foo',
            'body' => 'bar',
            'userId' => 1
        ]
    ]);

    echo $response;
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
```

## Contributing

Contributions are what make the open-source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you'd like to contribute, please follow these steps:

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

Alternatively, check out the issues tab for tasks that need to be done.

## License

Distributed under the GNU GPLv3 License. See `LICENSE` for more information.

## Contact

Ray Blair - rayblair06@hotmail.com

Project Link: [https://github.com/rayblair06/fetch-php](https://github.com/rayblair06/fetch-php)

## Acknowledgements

- [Awesome README Templates](https://github.com/matiassingers/awesome-readme)
- [Choose an Open Source License](https://choosealicense.com)
- [PHP](https://php.net/)
