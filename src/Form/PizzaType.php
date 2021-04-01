<?php

namespace App\Form;

use App\Entity\Base;
use App\Entity\Ingredient;
use App\Entity\Pizza;
use App\Entity\Size;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PizzaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pizza_name',TextType::class, ["label" => "Nom de la Pizza"])
            ->add('pizza_base', EntityType::class, [
                "label" => "Base de la Pizza",
                "class" => Base::class,
                "choice_label" => function ($size) {
                    return $size->getBaseName() . " - " . $size->getBasePrice() ."€";
                }
            ])
            ->add('pizza_size', EntityType::class, [
                "label" => "Taille de la Pizza",
                "class" => Size::class,
                "choice_label" => function ($size) {
                    return $size->getSizeName() . " - " . $size->getSizePrice() ."€";
                }
            ])
            ->add('pizza_ingredients', EntityType::class, [
                "label" => "Choix Ingrédients",
                "class" => Ingredient::class,
                "choice_label" => function ($ingredient) {
                    return $ingredient->getIngredientName() . " - " . $ingredient->getIngredientPrice() ."€";
                },
                "multiple" => true,
                "expanded" => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pizza::class,
        ]);
    }
}
