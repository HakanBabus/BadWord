# BadWord
Pocketmine BadWord Blocker Plugin. (API 5)

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
Config:
```
Badwords:
 duck:
  Space: true
 bex:
  Space: false
```

When i type duck on chat -> word is censored
When i type duckkkkkk on chat -> world is not censored

When i type bex on chat -> word is censored
When i type bexxxxxxx on chat -> word is censored
