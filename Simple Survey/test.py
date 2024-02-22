def generate_html(text):
    html_content = f'''
    <!DOCTYPE html>
    <html>
    <head>
        <title>User Input Text</title>
        <style>
            body {{
                background-color: pink;
                color: darkblue;
                font-family: Arial, sans-serif;
                padding: 20px;
            }}
        </style>
    </head>
    <body>
        <div>{text}</div>
    </body>
    </html>
    '''

    with open('user_text.html', 'w') as file:
        file.write(html_content)
    print("HTML file generated successfully!")


def main():
    user_text = input("Enter your text: ")
    generate_html(user_text)


if __name__ == "__main__":
    main()
