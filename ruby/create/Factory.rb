module Factory1
    class Car
        attr_accessor :name
        def initialize
        end
        def run
            puts "#{@name} is runing"
        end
    end
    
    class Acar < Car
        def initialize
            @name = 'Acar'
        end
    end
    class Bcar < Car
        def initialize
            @name = 'Bcar'
        end
    end

    class Factory
        def initialize
            
        end
        def getCar(carType)
            Factory1.const_get(carType).new
        end
    end

    module Test
        f = Factory.new
        c1 = f.getCar("Acar")
        c2 = f.getCar("Bcar")

        c1.run
        c2.run

    end
end