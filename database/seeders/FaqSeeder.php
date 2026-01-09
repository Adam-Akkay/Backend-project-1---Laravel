<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use App\Models\FaqItem;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define FAQ categories with their order
        $categories = [
            [
                'name' => 'Team & Algemeen',
                'order' => 1,
                'items' => [
                    [
                        'question' => 'Wat is SODA JC?',
                        'answer' => 'SODA JC is een zaalvoetbalteam bestaande uit jongeren van 18 tot 35 jaar. We spelen voornamelijk voor de liefde voor de sport, in de D-reeks van de Vlaamse zaalvoetbalcompetitie.',
                        'order' => 1,
                    ],
                    [
                        'question' => 'Waar en wanneer speelt SODA JC zijn thuiswedstrijden?',
                        'answer' => 'Onze thuiswedstrijden vinden plaats in Sporthal Comenius, te Gezusters Brontëplein 20, 1081 Koekelberg. Meestal spelen we op woensdag van 20u30 tot 21u30, maar dit kan variëren.',
                        'order' => 2,
                    ],
                    [
                        'question' => 'Kan ik de wedstrijden van SODA JC bekijken?',
                        'answer' => 'Ja! Iedereen is welkom om gratis te komen kijken en ons team te supporteren tijdens onze wedstrijden.',
                        'order' => 3,
                    ],
                    [
                        'question' => 'Speelt SODA JC om te winnen?',
                        'answer' => 'Ons team speelt vooral voor de sport en gezelligheid, niet per se om de beker te winnen. Natuurlijk laten we een kans om te winnen niet zomaar voorbijgaan.',
                        'order' => 4,
                    ],
                ],
            ],
            [
                'name' => 'Lid worden / Deelname',
                'order' => 2,
                'items' => [
                    [
                        'question' => 'Hoe kan ik lid worden van SODA JC?',
                        'answer' => 'Als je interesse hebt om lid te worden, kan je contact opnemen met onze teamcontactpersoon Adam Akkay via adam.akkay@hotmail.com. Hij zal je alle informatie geven over trainingen, wedstrijden en lidmaatschap.',
                        'order' => 1,
                    ],
                    [
                        'question' => 'Zijn er leeftijdsbeperkingen om lid te worden?',
                        'answer' => 'Ons team bestaat uit spelers tussen 18 en 35 jaar. Wij vragen nieuwe leden zich binnen deze leeftijdscategorie te bevinden.',
                        'order' => 2,
                    ],
                    [
                        'question' => 'Wat moet ik meenemen naar een eerste training of wedstrijd?',
                        'answer' => 'Breng sportkleding, zaalvoetbalschoenen en eventueel een drinkfles mee. Het is ook handig om een positieve mindset en sportieve houding mee te nemen!',
                        'order' => 3,
                    ],
                ],
            ],
            [
                'name' => 'Website & Account',
                'order' => 3,
                'items' => [
                    [
                        'question' => 'Wat als ik mijn wachtwoord vergeten ben?',
                        'answer' => 'Als je je wachtwoord vergeten bent, vul dan het contactformulier in op de website. Onze beheerder kan je account verifiëren en het wachtwoord opnieuw instellen.',
                        'order' => 1,
                    ],
                    [
                        'question' => 'Hoe kan ik mijn accountgegevens aanpassen?',
                        'answer' => 'Je kan je accountgegevens aanpassen door in te loggen op je profielpagina. Voor problemen kan je altijd Adam Akkay contacteren via adam.akkay@hotmail.com.',
                        'order' => 2,
                    ],
                    [
                        'question' => 'Ik heb een probleem met inloggen, wat moet ik doen?',
                        'answer' => 'Bij inlogproblemen kan je het contactformulier op de website invullen. Adam Akkay zal je helpen bij het herstellen van je toegang.',
                        'order' => 3,
                    ],
                ],
            ],
            [
                'name' => 'Wedstrijden & Competitie',
                'order' => 4,
                'items' => [
                    [
                        'question' => 'In welke reeks speelt SODA JC?',
                        'answer' => 'SODA JC speelt in de D-reeks van de Vlaamse zaalvoetbalcompetitie.',
                        'order' => 1,
                    ],
                    [
                        'question' => 'Kan ik meedoen aan de wedstrijden zonder lid te zijn?',
                        'answer' => 'Nee, alleen geregistreerde teamleden mogen deelnemen aan wedstrijden. Maar je bent altijd welkom als supporter tijdens onze wedstrijden.',
                        'order' => 2,
                    ],
                    [
                        'question' => 'Hoe kan ik op de hoogte blijven van het wedstrijdschema?',
                        'answer' => 'Het wedstrijdschema wordt regelmatig bijgewerkt op onze website en via de nieuwsbrief. Je kan je inschrijven op de nieuwsbrief om automatisch updates te ontvangen.',
                        'order' => 3,
                    ],
                ],
            ],
            [
                'name' => 'Contact & Vragen',
                'order' => 5,
                'items' => [
                    [
                        'question' => 'Wie kan ik contacteren voor vragen over het team?',
                        'answer' => 'Voor alle vragen kan je contact opnemen met Adam Akkay via adam.akkay@hotmail.com. Hij kan je helpen met alles rond wedstrijden, lidmaatschap en de website.',
                        'order' => 1,
                    ],
                    [
                        'question' => 'Kan ik suggesties of feedback geven over de website of het team?',
                        'answer' => 'Zeker! Je kan het contactformulier op de website invullen om je suggesties of feedback door te geven.',
                        'order' => 2,
                    ],
                ],
            ],
        ];

        // Seed categories and their items
        foreach ($categories as $categoryData) {
            // Create or update category (idempotent)
            $category = FaqCategory::updateOrCreate(
                ['name' => $categoryData['name']],
                ['order' => $categoryData['order']]
            );

            // Seed items for this category
            foreach ($categoryData['items'] as $itemData) {
                // Create or update item (idempotent)
                FaqItem::updateOrCreate(
                    [
                        'faq_category_id' => $category->id,
                        'question' => $itemData['question'],
                    ],
                    [
                        'answer' => $itemData['answer'],
                        'order' => $itemData['order'],
                    ]
                );
            }
        }
    }
}
