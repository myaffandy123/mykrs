<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\MataKuliah;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MataKuliahResource\Pages;
use App\Filament\Resources\MataKuliahResource\RelationManagers;

class MataKuliahResource extends Resource
{
    protected static ?string $model = MataKuliah::class;
    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';
    protected static ?string $navigationLabel = 'Mata Kuliah';
    protected static ?string $title = 'Mata Kuliah';
    protected static ?string $slug = 'mata-kuliah';
    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nama')
                            ->required()
                            ->label('Nama Mata Kuliah')
                            ->placeholder('Nama')
                            ->columnSpanFull(),
                        TextInput::make('kode')
                            ->label('Kode Mata Kuliah')
                            ->placeholder('Kode'),
                        TextInput::make('kelas')
                            ->required()
                            ->label('Kelas')
                            ->placeholder('Kelas'),
                        TextInput::make('sks')
                            ->required()
                            ->integer()
                            ->label('SKS')
                            ->placeholder('SKS')
                            ->minValue(1),
                        TextInput::make('ruang')
                            ->label('Ruang')
                            ->placeholder('Ruang'),
                        
                        ])
                    ->columns(4),
                Card::make()
                    ->schema([
                        Select::make('Hari')
                            ->required()
                            ->label('Hari')
                            ->placeholder('Pilih Hari')
                            ->options(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'])
                            ->native(false),
                            TimePicker::make('jam_mulai')
                            ->label('Jam Mulai')
                            ->required()
                            ->placeholder('00:00')
                            ->withoutSeconds()
                            ->native(false),
                            TimePicker::make('jam_selesai')
                            ->label('Jam Selesai')
                            ->placeholder('00:00')
                            ->withoutSeconds()
                            ->required()
                            ->native(false),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->sortable(),
                TextColumn::make('kode'),
                TextColumn::make('kelas')
                    ->sortable(),
                TextColumn::make('sks'),
                TextColumn::make('ruang'),
                TextColumn::make('hari')
                    ->sortable(),
                TextColumn::make('jam_mulai')
                    ->time('H:i'),
                TextColumn::make('jam_selesai')
                    ->time('H:i'),
            ])
            ->defaultSort('nama')
            ->modifyQueryUsing(fn(Builder $query) => $query->where('user_id', auth()->user()->id))
            ->filters([
                // SelectFilter::make('nama')
                //     ->attribute('nama'),
                // SelectFilter::make('kelas'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Edit'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Mata Kuliah'),
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
            'index' => Pages\ListMataKuliahs::route('/'),
            'create' => Pages\CreateMataKuliah::route('/create'),
            'edit' => Pages\EditMataKuliah::route('/{record}/edit'),
        ];
    }

    public function getHeading(): string
    {
        return __('Mata Kuliah');
    }

    public function getTitle(): string
    {
        return __('MyKRS - Mata Kuliah');
    }
}
