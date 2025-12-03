<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
 use Filament\Tables\Columns\ImageColumn;
 use Filament\Forms\Components\Textarea;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 TextInput::make('name'),
                TextInput::make('title'),
                FileUpload::make('image')
                    ->directory('blogs')
                     ->disk('public')
                         ->image(),
              
                Textarea::make('description')
                ->rows(5)
                ->label('Blog Description'),
              


                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
           TextColumn::make('name'),
           TextColumn::make('title'),
           ImageColumn::make('image')
     ->disk('public')
    ->label('Image'),
        TextColumn::make('description')
                ->label('Description')
                ->limit(50), 

      
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                 Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
               Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
