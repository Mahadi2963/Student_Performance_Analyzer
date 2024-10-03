<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MarkResource\Pages;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class MarkResource extends Resource
{
    protected static ?string $model = Mark::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                    ->relationship('student', 'name')  // Display Student Name
                    ->label('Student Name')
                    ->required(),

                Forms\Components\TextInput::make('student.student_id')
                    ->label('Student ID')
                    ->disabled(),  // Display Student ID (not editable)

                Forms\Components\Select::make('teacher_id')
                    ->relationship('teacher', 'name')  // Display Teacher Name
                    ->label('Teacher Name')
                    ->required(),

                Forms\Components\TextInput::make('teacher.teacher_id')
                    ->label('Teacher ID')
                    ->disabled(),  // Display Teacher ID (not editable)

                Forms\Components\Select::make('subject_id')
                    ->relationship('subject', 'name')  // Display Subject Name
                    ->label('Subject')
                    ->required(),

                Forms\Components\TextInput::make('present_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('absent_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('classTest_1')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('Lab_Test1')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('mid_mark')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('classTest_2')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('Lab_Test2')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('assignment')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('External_activity')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('total_mark')
                    ->numeric(),
                Forms\Components\TextInput::make('predicted_total_marks')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')  // Display Student Name
                    ->label('Student Name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('student.student_id')  // Display Student ID
                    ->label('Student ID')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('teacher.name')  // Display Teacher Name
                    ->label('Teacher Name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('teacher.teacher_id')  // Display Teacher ID
                    ->label('Teacher ID')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subject.name')  // Display Subject Name
                    ->label('Subject')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('present_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('absent_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('classTest_1')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Lab_Test1')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mid_mark')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('classTest_2')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Lab_Test2')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('assignment')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('External_activity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_mark')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('predicted_total_marks')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListMarks::route('/'),
            'create' => Pages\CreateMark::route('/create'),
            'view' => Pages\ViewMark::route('/{record}'),
            'edit' => Pages\EditMark::route('/{record}/edit'),
        ];
    }
}
