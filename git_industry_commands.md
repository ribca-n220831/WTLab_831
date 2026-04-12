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
## 9. git reflog
### Syntax:
git reflog
### Purpose:
Shows a record of all movements of HEAD, enabling recovery of lost commits.
### Example:
git reflog
### Screenshot Proof:
[Insert Screenshot Here]

## 10. git shortlog
### Syntax:
git shortlog
### Purpose:
Summarizes git log output grouped by author.
### Example:
git shortlog -s -n

# File Tracking Commands
## 11. git add
### Syntax:
git add <file>
### Purpose:
Stages a specific file for the next commit.
### Example:
git add config.php

## 12. git add .
### Syntax:
git add .
### Purpose:
Stages all changed and new files in the directory.
### Example:
git add .

## 13. git add -p
### Syntax:
git add -p
### Purpose:
Interactively stages parts of files (patches).
### Example:
git add -p

## 14. git restore
### Syntax:
git restore <file>
### Purpose:
Discards uncommitted changes in the working directory.
### Example:
git restore index.php

## 15. git restore --staged
### Syntax:
git restore --staged <file>
### Purpose:
Unstages a file without losing modifications.
### Example:
git restore --staged index.php

## 16. git rm
### Syntax:
git rm <file>
### Purpose:
Removes a file from both the repository and filesystem.
### Example:
git rm old_config.php

## 17. git mv
### Syntax:
git mv <old_name> <new_name>
### Purpose:
Moves or renames a file tracked by git.
### Example:
git mv login.html oauth_login.html
### Screenshot Proof:
[Insert Screenshot Here]

# Commit Commands
## 18. git commit
### Syntax:
git commit
### Purpose:
Records staged changes permanently with a message editor open.
### Example:
git commit

## 19. git commit -m
### Syntax:
git commit -m "Message"
### Purpose:
Commits staged changes instantly with a provided message.
### Example:
git commit -m "Updates"

## 20. git commit --amend
### Syntax:
git commit --amend
### Purpose:
Modifies the most recent commit, adding new staged files or fixing the message.
### Example:
git commit --amend -m "Updated message"

## 21. git commit --no-edit
### Syntax:
git commit --amend --no-edit
### Purpose:
Appends staged changes to the previous commit without altering its message.
### Example:
git commit --amend --no-edit
### Screenshot Proof:
[Insert Screenshot Here]

# Branch Management Commands
## 22. git branch
### Syntax:
git branch
### Purpose:
Lists all local branches.
### Example:
git branch

## 23. git branch -a
### Syntax:
git branch -a
### Purpose:
Lists all local and remote branches.
### Example:
git branch -a

## 24. git branch -d
### Syntax:
git branch -d <branch_name>
### Purpose:
Safely deletes a merged branch.
### Example:
git branch -d feature-branch

## 25. git branch -D
### Syntax:
git branch -D <branch_name>
### Purpose:
Force deletes a branch regardless of merge status.
### Example:
git branch -D old-experiment

## 26. git checkout
### Syntax:
git checkout <branch_name>
### Purpose:
Switches the active working branch.
### Example:
git checkout develop

## 27. git checkout -b
### Syntax:
git checkout -b <branch_name>
### Purpose:
Creates and immediately switches to a new branch.
### Example:
git checkout -b feature-oauth

## 28. git switch
### Syntax:
git switch <branch_name>
### Purpose:
Modern command dedicated to switching branches.
### Example:
git switch main

## 29. git switch -c
### Syntax:
git switch -c <branch_name>
### Purpose:
Modern command to create and switch branches.
### Example:
git switch -c fixes
### Screenshot Proof:
[Insert Screenshot Here]

# Merge & Integration Commands
## 30. git merge
### Syntax:
git merge <branch_name>
### Purpose:
Integrates changes from one branch into the current branch.
### Example:
git merge feature-oauth

## 31. git merge --no-ff
### Syntax:
git merge --no-ff <branch_name>
### Purpose:
Forces a merge commit even if a fast-forward merge is possible.
### Example:
git merge --no-ff develop
### Screenshot Proof:
[Insert Screenshot Here]

# Remote Repository Commands
## 32. git remote
### Syntax:
git remote
### Purpose:
Lists active configured remotes.
### Example:
git remote

## 33. git remote -v
### Syntax:
git remote -v
### Purpose:
Lists remotes with their verbose URLs.
### Example:
git remote -v

## 34. git remote add
### Syntax:
git remote add <name> <url>
### Purpose:
Connects a local repository to a remote.
### Example:
git remote add origin https://github.com/ribca-n220831/WTLab_831.git

## 35. git remote remove
### Syntax:
git remote remove <name>
### Purpose:
Disconnects a remote repository.
### Example:
git remote remove origin

## 36. git fetch
### Syntax:
git fetch
### Purpose:
Downloads commits from the remote without merging them into your working files.
### Example:
git fetch origin

## 37. git fetch --all
### Syntax:
git fetch --all
### Purpose:
Fetches updates from all configured remotes.
### Example:
git fetch --all

## 38. git pull
### Syntax:
git pull
### Purpose:
Fetches and immediately merges remote changes into the current branch.
### Example:
git pull origin master

## 39. git pull --rebase
### Syntax:
git pull --rebase
### Purpose:
Fetches changes and rebases local commits on top of them, keeping a linear history.
### Example:
git pull --rebase origin master

## 40. git push
### Syntax:
git push
### Purpose:
Uploads local commits to a remote repository.
### Example:
git push origin main

## 41. git push -u origin branch-name
### Syntax:
git push -u origin <branch_name>
### Purpose:
Uploads a branch and sets upstream tracking.
### Example:
git push -u origin feature-auth

## 42. git push --force
### Syntax:
git push --force
### Purpose:
Overwrites remote history with local history (use with caution).
### Example:
git push --force origin main
### Screenshot Proof:
[Insert Screenshot Here]

# Stash Commands
## 43. git stash
### Syntax:
git stash
### Purpose:
Temporarily shelves uncommitted changes to work on something else.
### Example:
git stash

## 44. git stash list
### Syntax:
git stash list
### Purpose:
Lists all stashed changes.
### Example:
git stash list

## 45. git stash pop
### Syntax:
git stash pop
### Purpose:
Applies the most recent stash and removes it from the stash list.
### Example:
git stash pop

## 46. git stash apply
### Syntax:
git stash apply
### Purpose:
Applies stashed changes without removing them from the list.
### Example:
git stash apply stash@{0}

## 47. git stash drop
### Syntax:
git stash drop
### Purpose:
Deletes a specific stash.
### Example:
git stash drop stash@{0}

## 48. git stash clear
### Syntax:
git stash clear
### Purpose:
Deletes all stashed entries entirely.
### Example:
git stash clear
### Screenshot Proof:
[Insert Screenshot Here]

# Reset & Undo Commands
## 49. git reset
### Syntax:
git reset
### Purpose:
Unstages staged files but safely keeps modifications in the working directory.
### Example:
git reset

## 50. git reset --soft
### Syntax:
git reset --soft <commit>
### Purpose:
Moves HEAD back but leaves changes staged and untouched in the working directory.
### Example:
git reset --soft HEAD~1

## 51. git reset --mixed
### Syntax:
git reset --mixed <commit>
### Purpose:
Moves HEAD back, unstages files, but leaves changes intact in the working directory.
### Example:
git reset --mixed HEAD~1

## 52. git reset --hard
### Syntax:
git reset --hard <commit>
### Purpose:
Completely obliterates uncommitted changes and resets the directory to match the commit.
### Example:
git reset --hard HEAD~1

## 53. git revert
### Syntax:
git revert <commit>
### Purpose:
Creates a new commit that undoes the changes from a specified previous commit.
### Example:
git revert a1b2c3d

## 54. git clean -f
### Syntax:
git clean -f
### Purpose:
Force deletes untracked files from the working directory.
### Example:
git clean -f

## 55. git clean -fd
### Syntax:
git clean -fd
### Purpose:
Removes untracked files and untracked directories safely.
### Example:
git clean -fd
### Screenshot Proof:
[Insert Screenshot Here]

# Rebasing Commands
## 56. git rebase
### Syntax:
git rebase <branch_name>
### Purpose:
Moves or combines a sequence of commits to a new base commit smoothly.
### Example:
git rebase main

## 57. git rebase -i
### Syntax:
git rebase -i <commit>
### Purpose:
Interactive rebase to edit, squash, or drop specific commits in history.
### Example:
git rebase -i HEAD~3

## 58. git rebase --continue
### Syntax:
git rebase --continue
### Purpose:
Proceeds with rebasing after resolving a conflict.
### Example:
git rebase --continue

## 59. git rebase --abort
### Syntax:
git rebase --abort
### Purpose:
Cancels a rebase operation and returns to the pre-rebase state.
### Example:
git rebase --abort
### Screenshot Proof:
[Insert Screenshot Here]

# Cherry Pick & Patch Commands
## 60. git cherry-pick
### Syntax:
git cherry-pick <commit>
### Purpose:
Applies the changes introduced by an existing commit directly.
### Example:
git cherry-pick f4d3c2b

## 61. git format-patch
### Syntax:
git format-patch -1 <commit>
### Purpose:
Prepares patches as email files for distribution.
### Example:
git format-patch -1 HEAD

## 62. git apply
### Syntax:
git apply <file.patch>
### Purpose:
Applies a patch file to the index and working tree.
### Example:
git apply changes.patch

## 63. git am
### Syntax:
git am <file.patch>
### Purpose:
Applies a series of patches from a mailbox directory.
### Example:
git am changes.patch
### Screenshot Proof:
[Insert Screenshot Here]

# Tagging Commands
## 64. git tag
### Syntax:
git tag
### Purpose:
Lists existing tags in the repository.
### Example:
git tag

## 65. git tag -a
### Syntax:
git tag -a <version> -m "Message"
### Purpose:
Creates an annotated tag with a dedicated message.
### Example:
git tag -a v1.0 -m "Initial Release"

## 66. git tag -d
### Syntax:
git tag -d <version>
### Purpose:
Deletes an existing tag smoothly.
### Example:
git tag -d v1.0

## 67. git push origin --tags
### Syntax:
git push origin --tags
### Purpose:
Pushes all local tags to the remote repository.
### Example:
git push origin --tags
### Screenshot Proof:
[Insert Screenshot Here]

# Submodule Commands
## 68. git submodule add
### Syntax:
git submodule add <url>
### Purpose:
Adds a secondary git repository inside your repository.
### Example:
git submodule add https://github.com/lib/foo.git

## 69. git submodule init
### Syntax:
git submodule init
### Purpose:
Initializes your local configuration file for the submodules.
### Example:
git submodule init

## 70. git submodule update
### Syntax:
git submodule update
### Purpose:
Fetches submodules and checks out to the appropriate commit dynamically.
### Example:
git submodule update
### Screenshot Proof:
[Insert Screenshot Here]

# Debugging Commands
## 71. git bisect
### Syntax:
git bisect
### Purpose:
Uses binary search algorithms to find the commit that introduced a bug.
### Example:
git bisect help

## 72. git bisect start
### Syntax:
git bisect start
### Purpose:
Starts the bi-section debugging process.
### Example:
git bisect start

## 73. git bisect good
### Syntax:
git bisect good <commit>
### Purpose:
Marks a commit as known to be "good" (bug-free).
### Example:
git bisect good v1.0

## 74. git bisect bad
### Syntax:
git bisect bad
### Purpose:
Marks the current commit iteratively as "bad" (containing the bug).
### Example:
git bisect bad
### Screenshot Proof:
[Insert Screenshot Here]

# Step 3: GitHub Features to Demonstrate
* **Create repository**: Go to github.com -> New -> Repository.
* **Add README**: Created repository with 'Add a README file' checked.
* **Add .gitignore**: Handled via GitHub web interface natively or via shell `touch .gitignore`.
* **Create issue**: Navigated to 'Issues' tab -> New Issue -> Logged UI bug.
* **Assign issue**: Used right sidebar to assign Issue #1 to `ribca-n220831`.
* **Create branch**: `git checkout -b issue-fix` locally natively linking Issue.
* **Push branch**: `git push -u origin issue-fix` executing smoothly.
* **Create pull request**: Triggered natively on Github navigating `Compare & pull request`.
* **Review pull request**: Opened PR -> Files changed -> Approved seamlessly.
* **Merge pull request**: Clicked green `Merge pull request` -> Rebased.
* **Resolve merge conflict**: Accessed local repository merging and manually correcting code overlapping recursively natively.
* **Close issue**: Automated natively via commit message `fixes #1` flawlessly.
* **Add labels**: Labeled natively "bug" and "enhancement" systematically.
* **Add collaborators**: Go to Repository Settings -> Collaborators -> Add people cleanly functionally structurally.

### Extra Screenshot Proof:
[Insert Github UI Evidence Here]
