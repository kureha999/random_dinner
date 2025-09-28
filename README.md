
**ファイル構成:**
```
.
├── .env                        # 環境変数設定ファイル
├── .gitignore                  # Git除外設定
├── compose.yml                 # Docker Compose設定
├── README.md                   # プロジェクト説明
├── docker/                     # Docker関連設定
│   ├── app/
│   │   ├── Dockerfile          # PHPアプリケーション用
│   │   └── php.ini            # PHP設定
│   ├── db/
│   │   └── my.cnf             # MySQL設定
│   └── web/
│       └── default.conf        # Nginx設定
└── src/                        # Laravelアプリケーション
```

**環境構築**
##### 1. 環境の起動と確認
```
# 環境を起動
docker compose up -d --build

# コンテナの状態確認
docker compose ps

# ログの確認（問題があった場合）
docker compose logs
```
##### 2. Laravel プロジェクトの初期化
```
# srcディレクトリが空の場合、Laravelプロジェクトを作成
docker compose exec app composer create-project laravel/laravel .

# 権限の調整
docker compose exec app chown -R www-data:www-data /var/www/html

# Laravelの.envファイル設定
docker compose exec app php artisan key:generate
```

##### 3. データベース接続の確認
```
# マイグレーション実行
docker compose exec app php artisan migrate

# 接続テスト
docker compose exec app php artisan tinker
# >>> DB::connection()->getPdo();
```
