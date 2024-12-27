import re

# Validate an email
email = "user@example.com"
pattern = r'^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$'
if re.match(pattern, email):
    print("Valid email")
else:
    print("Invalid email")
