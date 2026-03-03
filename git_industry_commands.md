# Industry Level Git Commands Practice
## 1. git config --global user.name
### Syntax:
git config --global user.name "Your Name"
### Purpose:
Sets the global username for Git. This name appears as the author in commit history.
### Example:
git config --global user.name "ribca-n220831"
## 2. git config --global user.email
### Syntax:
git config --global user.email "your-email@example.com"
### Purpose:
Sets the global email address for Git commits. This email should match the email used in the GitHub account.
### Example:
git config --global user.email "n220831@rguktn.ac.in"
## 3. git config --list
### Syntax:
git config --list
### Purpose:
Displays all Git configuration settings including username and email.
### Example:
git config --list
## 4. git config --unset
### Syntax:
git config --unset user.name
### Purpose:
Removes a specific Git configuration setting.
### Example:
git config --unset user.name
### Screenshot Proof:
<img width="1366" height="720" alt="configuration commands" src="https://github.com/user-attachments/assets/ad4dfbee-ccbd-4c25-8350-de8c7a9c16ca" />

# Repository Setup Commands
## 5. git init
### Syntax:
git init
### Purpose:
Initializes a new Git repository in the current directory. It creates a hidden .git folder to track project changes.
### Example:
git init
## 6. git clone
### Syntax:
git clone <repository-url>
### Purpose:
Creates a copy of an existing remote repository into your local system.
### Example:
git clone https://github.com/ribca-n220831/WTLab_831.git
## 7. git clone --branch
### Syntax:
git clone --branch <branch-name> <repository-url>
### Purpose:
Clones a specific branch from the remote repository instead of the default branch.
### Example:
git clone --branch master https://github.com/ribca-n220831/WTLab_831.git
## 8. git clone --depth
### Syntax:
git clone --depth <number> <repository-url>
### Purpose:
Clones the repository with limited commit history (shallow clone). This reduces download size and time.
### Example:
git clone --depth 1 https://github.com/ribca-n220831/WTLab_831.git
### Screenshot Proof:
<img width="1366" height="768" alt="Screenshot (2)" src="https://github.com/user-attachments/assets/402a3c19-2049-41c9-850b-565099023289" />
