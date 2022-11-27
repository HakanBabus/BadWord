# BadWord
Pocketmine BadWord Blocker Plugin. (API 4)

# Usage
Go to plugin_data/BadWord/data.yml

You can set bad words from inside the data.yml file
```
Badwords:
 badword1:
  Space: true
 badword2:
  Space: false
```

If the spaces are true, the word of the message is searched for swearing exactly.
If false, if the word contains swearing, the word is censored.

# Example:
Let's have a forbidden word in the name bad.
Let the spaces true in this forbidden word.

When bad is typed in chat, badword is censored.
When badd is typed, the word is not censored.

If the spaces were wrong:
The word was censored when badd was typed.
