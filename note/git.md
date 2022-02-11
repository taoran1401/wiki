# git操作


### git打标签

```
git add .
git commit -m "feat: 添加功能"
git push
git tag -a v1.0.1 -m "feat: 添加功能"
git push origin v1.0.1
```

### objects文件夹下大文件清理

由于之前上传过大文件，虽然文件已经删除，但是记录还在，导致git工程变的很大；

```
显示10个最大的文件id列表
git verify-pack -v .git/objects/pack/pack-*.idx | sort -k 3 -g | tail -10

根据文件id查询文件路径
git rev-list --objects --all | grep [上个命令查询到的id]

移除文件
git log --pretty=oneline --branches -- [your_file]

删除文件的历史记录(删除目录时需添加-r参数： git rm -r ...)
git filter-branch --force --index-filter 'git rm --cached --ignore-unmatch --ignore-unmatch [your_file]' --prune-empty --tag-name-filter cat -- --all

push
git push --force --all

清理缓存
rm -rf .git/refs/original
rm -rf .git/logs/
git gc      # 收集打包并合并松散对象，然后将不被任何commit引用并已经存在一段时间的对象删除
git prune   # 它会删除所有过期的、不可达的且未被打包的松散对象
```